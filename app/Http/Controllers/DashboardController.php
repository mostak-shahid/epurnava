<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profiles;
        return view('dashboard.index',['user' => $user,'profile'=>$profile]);
    }
    public function accountupdate(Request $request)
    {
        $id = Auth::id();
        //dd($request->all());
        //if ($id != Auth::user()) return false;
        $this->validate($request,[
            'avatar'=> ['nullable','image'],
            'first_name' => ['required', 'regex:/^[a-z .-]+$/i'],
            'last_name' => ['nullable','regex:/^[a-z .-]+$/i'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone, '. auth()->user()->id . ',id'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users,email, '. auth()->user()->id . ',id'],
            //unique:table,column,except,idColumn
            //'required|email|unuque:users,email, '. auth()->user()->id . ',id'
        ]);
        $user = User::find($id);
        if ($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars',$avatar_new_name);
            $user->avatar =  'uploads/avatars/'.$avatar_new_name;
        }
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        /*Profile::where('user_id', $id)
            ->where('option','first_name')
            ->update(['value' => $request->first_name]);

        Profile::where('user_id', $id)
            ->where('option','last_name')
            ->update(['value' => $request->last_name]);*/

        Profile::updateOrCreate(
            ['user_id'   => Auth::user()->id,'option' => 'first_name',],
            [
                'option' => 'first_name',
                'value' => $request->first_name
            ]
        );

        Profile::updateOrCreate(
            ['user_id'   => Auth::user()->id,'option' => 'last_name',],
            [
                'option' => 'last_name',
                'value' => $request->last_name
            ]
        );

        Session::flash('success', 'Account Information has been changed');
        return redirect()->route('dashboard');
    }
    public function address(){
        $user = Auth::user();
        $profile = $user->profiles;
        return view('dashboard.address',['user' => $user,'profile'=>$profile]);
    }

    /**
     * @param Request $request
     */
    public function addressstore(Request $request){
        // dd($request->all());
        $address = array();
        $user = Auth::user();
        $profile = $user->profiles->where('option','address')->first();
        if (@$profile->value)
            $address = unserialize($profile->value);
        // validate Address
        $this->validate($request,[
            'first_name' => ['required', 'regex:/^[a-z .-]+$/i'],
            'last_name' => ['nullable','regex:/^[a-z .-]+$/i'],
            'phone' => ['required', 'string', 'max:255'],
            'fax' => ['nullable', 'string', 'max:255'],
            'address' => ['required','string', 'max:255'],
            'district' => ['nullable','string', 'max:255'],
            'postcode' => ['nullable','string', 'max:10', 'regex:/^\d{4,5}(?:[-\s]\d{4})?$/'],
        ]);
        $n = sizeof($address);
        $type = 'other';
        if ($request->default){
            for ($i=0;$i<$n;$i++) {
                $address[$i]['type'] = $type;
            }
            $type = 'default';
        }
        if($request->address_id != 'new'){
            $n = $request->address_id;
        }
        // Add to array
        $address[$n] = array(
            'type' => $type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'address' => $request->address,
            'district' => $request->district,
            'postcode' => $request->postcode,
        );
        Profile::updateOrCreate(
            ['user_id'   => Auth::id(),'option' => 'address',],
            [
                'option' => 'address',
                'value' => serialize($address)
            ]
        );
        // return redirect()->route($request->redirectto);
        return redirect()->back();
    }
    public function addresssetdefault($id){
        $user = Auth::user();
        $address = unserialize($user->profiles->where('option','address')->first()->value);
        for ($i=0;$i<sizeof($address);$i++) {
            if($i == $id) {
                $address[$i]['type'] = 'default';
            } else {
                $address[$i]['type'] = 'other';
            }
        }
        Profile::updateOrCreate(
            ['user_id'   => Auth::id(),'option' => 'address',],
            [
                'option' => 'address',
                'value' => serialize($address)
            ]
        );
        return redirect()->back();
    }
    public function addressdelete($id){
        $user = Auth::user();
        $address = unserialize($user->profiles->where('option','address')->first()->value);
        if ($address[$id]['type'] != 'default') {
            unset($address[$id]);
            Profile::updateOrCreate(
                ['user_id' => Auth::id(), 'option' => 'address',],
                [
                    'option' => 'address',
                    'value' => serialize($address)
                ]
            );
        }
        return redirect()->back();

    }
    public function passwordedit(){
        return view('dashboard.editpassword');
    }
    public function passwordupdate(Request $request){
        $this->validate($request,[
            'cupprent_password' => ['nullable', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $current_password = Auth::user()->password;
        if(!$current_password || Hash::check($request->current_password, $current_password))
        {
            $user = Auth::User();
            // $user = User::find($user_id);
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return redirect()->back();
    }
}

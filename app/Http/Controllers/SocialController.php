<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Profile;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo,$provider);

        auth()->login($user);

        return redirect()->to('/dashboard');

    }
    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();

        if (!$user) {
            $user = User::create([
                // 'name'     => $getInfo->name,
                'avatar'     => $getInfo->avatar,
                'email'    => $getInfo->email,
                'admin' => 0,
                'role_id' => 6,
                'is_active' => 1,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
            Profile::create([
                'user_id' => $user->id,
                'option' => 'first_name',
                'value' => $getInfo->name,
            ]);
        }
        return $user;
    }
}
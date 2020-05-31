<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Category;

class ajaxController extends Controller
{
    public function addresssingle($id){
        $user = Auth::user();
        $address = unserialize($user->profiles->where('option','address')->first()->value);
        return response()->json($address[$id]);
        // return response()->json(['success'=>'Product deleted successfully.']);
    }
    public function catrgorysingle($id){
        $output = array();
        $category = Category::findOrFail($id);
        $output['id'] = $category->id;
        $output['name'] = $category->name;
        $output['parent'] = $category->parent;
        $output['description'] = $category->description;
        $output['thumbnail_id'] = $category->thumbnail;
        $output['banner_id'] = $category->banner;
        if ($category->thumbnail) {
            $output['thumbnail'] = route('image', ['url'=> $category->thumbnail, 'width'=>80]);
        } else {
            $output['thumbnail'] = route('image', ['url'=> 'no_image_available.jpg', 'width'=>80]);
        }
        if ($category->banner) {
            $output['banner'] = route('image', ['url'=> $category->banner, 'width'=>80]);
        } else {
            $output['banner'] = route('image', ['url'=> 'no_image_available.jpg', 'width'=>80]);
        }

        // return response()->json(Category::findOrFail($id));
        return response()->json($output);
    }
}

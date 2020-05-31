<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>'auth'], function(){
    Route::group(['prefix'=>'ajax'], function(){
        Route::get('/address/{id?}','ajaxController@addresssingle')->name('address.single');
        Route::get('/catrgory/{id?}','ajaxController@catrgorysingle')->name('catrgory.single');
    });

    Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
        Route::get('/','AdminController@index')->name('admin');
        Route::get('/product/categories', 'PostController@productcategories')->name('admin.product.categories');
        Route::get('/product/tags', 'PostController@producttags')->name('admin.product.tags');
        Route::get('/product/create', 'PostController@productcreate')->name('admin.product.create');

        Route::post('/category/store', 'PostController@categorystore')->name('admin.category.store');
        Route::post('/category/update', 'PostController@categoryupdate')->name('admin.category.update');
        Route::get('/category/destroy/{id}', 'PostController@categorydestroy')->name('admin.category.destroy');

        Route::post('/post/store', 'PostController@store')->name('admin.post.store');
    });
    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('/','DashboardController@index')->name('dashboard');
        Route::post('/account/update','DashboardController@accountupdate')->name('dashboard.account.update');
        Route::get('/address-book','DashboardController@address')->name('dashboard.address');
        Route::post('/address-book/store','DashboardController@addressstore')->name('dashboard.address.store');
        Route::get('/address-book/setdefault/{id}','DashboardController@addresssetdefault')->name('dashboard.address.setdefault');
        Route::get('/address-book/delete/{id}','DashboardController@addressdelete')->name('dashboard.address.delete');
        Route::get('/password/edit','DashboardController@passwordedit')->name('dashboard.password.edit');
        Route::post('/password/update','DashboardController@passwordupdate')->name('dashboard.password.update');
    });
    // Route::get('/post/create', ['uses'=>'PostsController@create', 'as'=>'post.create']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/image/{url}/{width}/{height?}', function($url,$width,$height=null){
    if (is_numeric($url)) {
        if (preg_match('/image/i', App\Media::find($url)->type)) {
            $url = App\Media::find($url)->url;
        }
        else {
            $url = 'no_image_available.jpg';
        }
    }

    if ($width && $height) {
        $img = Image::make($url)->fit($width, $height);
    } else {
        $img = Image::make($url)->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        });
    }
    $arr = explode('.',$url);
    if (is_array($arr)) {
        $ext = end($arr);
        return $img->response($ext);
    }
    return $img->response('jpg');
    // $img->save('bar.jpg', 60);
})->name('image');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

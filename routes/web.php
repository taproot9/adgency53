<?php

use App\Admin;
use App\Adspace;
use App\Rent;
use App\User;
use Illuminate\Support\Facades\Auth;

//public route
Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/ad_spaces', function (){
//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->notreserved()->paginate(2);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces'));
});


//auth route
Auth::routes();

//admin route
Route::get('/admin_home', 'AdminHomeController@index');
Route::get('/admin_login', 'AdminAuth\LoginController@showLoginForm') ;
Route::post('/admin_login', 'AdminAuth\LoginController@login');
Route::post('/admin_logout', 'AdminAuth\LoginController@logout');
Route::post('/admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get ('/admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('/admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('/admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
Route::get('/admin_show_profile','AdminController@showProfile');
Route::get('/admin/{id}/edit_profile', 'AdminController@editProfile');
Route::patch('/admin/{id}', 'AdminController@update_profile')->name('update_profile');
Route::get('/admin/users_account', 'AdminController@users_account')->name('users_account');
Route::get('admin/all_adspace', 'AdminController@all_adspace')->name('all_adspace');
//Route::get('/admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
//Route::post('/admin_register', 'AdminAuth\RegisterController@register');

//owners route
Route::get('/owner/create_posts', 'OwnersPostsController@create');
Route::post('/owner', 'OwnersPostsController@store');
Route::get('/owner/my_post/{id}', 'OwnersPostsController@my_post');
Route::get('/owner/delete/{id}', 'OwnersPostsController@delete');
Route::get('/owner/{id}/edit_post', 'OwnersPostsController@edit_post')->name('edit_post');
Route::patch('/owner/{id}', 'OwnersPostsController@update_post')->name('update_post');
Route::get('/owner/my_all_post/{id}', 'OwnersPostsController@my_all_post');
Route::get('/owner/show/profile', 'OwnerController@owner_show_profile')->name('owner_show_profile');
Route::get('/owner/{id}/edit_profile', 'OwnerController@owner_edit_profile')->name('owner_edit_profile');
Route::patch('/owner/update/{id}', 'OwnerController@owner_update_profile')->name('owner_update_profile');
Route::get('show_all_rented', 'OwnerController@show_all_rented')->name('show_all_rented');
Route::get('/owner/{id}/edit_rented_post', 'OwnerController@edit_rented_post')->name('edit_rented_post');


//client route
Route::get('/client/available_post', 'ClientController@available_post');
Route::get('/client/show/profile', 'ClientController@client_show_profile')->name('client_show_profile');
Route::get('/client/{id}/edit_profile', 'ClientController@client_edit_profile')->name('client_edit_profile');
Route::patch('/client/update/{id}', 'ClientController@client_update_profile')->name('client_update_profile');
Route::get('client/show_available_rent', 'ClientController@show_available_rent')->name('show_available_rent');




//testing area here


Route::get('isLogin', function (){

//    if(Auth::guard('admin')->check()){
//        echo "ok";
//    }else{
//        echo "none";
//    }

    return Auth::guard('admin')->user()->name;
});

Route::get('/get_role_id', function (){
    return Auth::user()->id;
});

Route::get('/posted_by', function (){
    return Auth::user()->first_name;
});


Route::get('/show_all_add_spaces', function (){
    $ad_spaces = Adspace::all();
    return view('test_ads', compact('ad_spaces'));
});

Route::get('/add', function (){
    $rent = Rent::findOrFail(2);
    $rent->ad_spaces()->attach(2);
});
//retrieve
Route::get('/show', function (){
    $rents = Rent::where('client_id', 3)->get();
    foreach ($rents as $rent){
        foreach ($rent->ad_spaces as $item){
            echo $item->photo_name.'<br>';
        }
    }
});

Route::get('/show_rent', function (){
    $rents =  Adspace::whereAdvertisingType('rent')->get();
    foreach($rents as $rent){
        echo $rent->advertising_type;
    }
});

Route::get('/test', function (){

    $ads = Adspace::all();
    foreach ($ads as $ad){
        echo $ad->posted_by.'<br>';
        echo $ad->advertising_type.'<br>';
        echo $ad->size.'<br>';
        echo $ad->location.'<br>';
        echo $ad->price.'<br>';
        echo $ad->status.'<br>';
        echo '<hr>';
    }
});


Route::get('/home', 'HomeController@index');


Route::get('/show_admin', function (){
    return Admin::all();
});


Route::get('/create_admin', function (){
    Admin::create(['name' => 'Ryan','email' => 'jayson.boter1@gmail.com','password'=>bcrypt('secret')]);
});

//view all user
Route::get('/admin_view_all_user', function (){
    return User::all();
});

//update
Route::get('/admin_update/{id}', function ($id){
    $admin = Admin::findOrFail($id);
    $admin->update(['name'=>'names', 'email'=>'ryan1234@yahoo.com', 'password'=>bcrypt('secret')]);
});



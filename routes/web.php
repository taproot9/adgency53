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


//owners route

Route::get('/owner/create_posts', 'OwnersPostsController@create');
Route::post('/owner', 'OwnersPostsController@store');
Route::get('/owner/my_post/{id}', 'OwnersPostsController@my_post');
Route::get('/owner/delete/{id}', 'OwnersPostsController@delete');
Route::get('/owner/{id}/edit_post', 'OwnersPostsController@edit_post')->name('edit_post');
Route::patch('/owner/{id}', 'OwnersPostsController@update_post')->name('update_post');
Route::get('/owner/my_all_post/{id}', 'OwnersPostsController@my_all_post');



//client route

Route::get('/client/available_post', 'ClientController@available_post');

//auth route
Auth::routes();

//Route::get('/home', 'HomeController@index');












//testing area


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




//testing for client
//add
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





//testing for admin here;

Route::get('/show_admin', function (){
    return Admin::all();
});


Route::get('/admin_login', 'AdminAuth\LoginController@showLoginForm') ;
Route::post('/admin_login', 'AdminAuth\LoginController@login');
Route::post('admin_logout', 'AdminAuth\LoginController@logout');
Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get ('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin_register', 'AdminAuth\RegisterController@register');

Route::get('/home', 'HomeController@index');
Route::get('/admin_home', 'AdminHomeController@index');



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



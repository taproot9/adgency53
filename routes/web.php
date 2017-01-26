<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Adspace;
use Illuminate\Support\Facades\Auth;


//public route
Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/ad_spaces', function (){
    $ad_spaces = Adspace::paginate(15);
    return view('test_ads', compact('ad_spaces'));
});


//owners route
Route::get('/owner/create_posts', 'OwnersPostsController@create');
Route::post('/owner', 'OwnersPostsController@store');

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





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
//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->notreserved()->paginate(2);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces'));
});


//owners route

Route::post('/owner', 'OwnersPostsController@store');
Route::get('/owner/create_posts', 'OwnersPostsController@create');
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





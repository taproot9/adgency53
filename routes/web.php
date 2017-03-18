<?php

use App\Admin;
use App\Adspace;
use App\Rent;
use App\Reservation;
use App\Sale;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

//public route
Route::get('/', function () {

    if (Auth::guest()){
        return view('index');
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    return view('index', compact('rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));

});

Route::get('/contact', function (){

    if (Auth::guest()){
        return view('index');
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    return view('contact', compact('rents', 'rents_client', 'sales', 'sales_client', 'reserves', 'reserves_client'));
});

Route::get('ad_spaces/search',function (Request $request){

//    return $request->all();

    $search = $request->search;
//    $posts = Posts::where('title', 'like', '%' . $search . '%')->where('active', 1)->orderBy('created_at')->paginate(3);


    if (Auth::guest()){

//        $ad_spaces = Adspace::where('status', 1)
//            ->orWhere('advertising_type', 'like', '%' . $search . '%')
//            ->orWhere('adspace_type', 'like', '%' . $search . '%')
//            ->orWhere('size', 'like', '%' . $search . '%')
//            ->orWhere('location', 'like', '%' . $search . '%')
//            ->orWhere('price', 'like', '%' . $search . '%')
//            ->orWhere('reserve_until', 'like', '%' . $search . '%')
//            ->orWhere('posted_by', 'like', '%' . $search . '%')
//            ->latest()
//            ->paginate(9);
        if ($request->type!='all'){
            $ad_spaces = Adspace::where('status', 1)
                ->where($request->type, 'like', '%' . $search . '%')
                ->latest()
                ->paginate(9);
        }else{
            $ad_spaces = Adspace::where('status', 1)
                ->latest()
                ->paginate(9);
        }


        return view('test_ads', compact('ad_spaces'));
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

//    $ad_spaces = Adspace::where('status', 1)
//        ->orWhere('advertising_type', 'like', '%' . $search . '%')
//        ->orWhere('adspace_type', 'like', '%' . $search . '%')
//        ->orWhere('size', 'like', '%' . $search . '%')
//        ->orWhere('location', 'like', '%' . $search . '%')
//        ->orWhere('price', 'like', '%' . $search . '%')
//        ->orWhere('reserve_until', 'like', '%' . $search . '%')
//        ->orWhere('posted_by', 'like', '%' . $search . '%')
//        ->latest()
//        ->paginate(9);

    if ($request->type!='all'){
        $ad_spaces = Adspace::where('status', 1)
            ->where($request->type, 'like', '%' . $search . '%')
            ->latest()
            ->paginate(9);
    }else{
        $ad_spaces = Adspace::where('status', 1)
            ->latest()
            ->paginate(9);
    }

    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});

Route::get('/home', function () {

    //rent notification

    if (Auth::guest()){
        return view('index');
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification
    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    return view('index', compact('rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
});

Route::get('/about_us', function (){
    if (Auth::guest()){
        return view('about_us');
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification
    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    return view('about_us', compact('rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));

});

Route::get('/ad_spaces/', function (){

    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    $ad_spaces = Adspace::latest()->available()->paginate(9);

    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));
});






Route::get('search_lamp', function (){
    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->lamp()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }


    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->lamp()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});

Route::get('search_bus', function (){
    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->bus()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }


    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->bus()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});
Route::get('search_billboard', function (){
    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->billboard()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }


    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->billboard()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});
Route::get('search_led', function (){
    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->led()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->led()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});
Route::get('search_jeep', function (){
    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->jeep()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }


    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->jeep()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});
Route::get('search_taxi', function (){

    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->taxi()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }


    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->taxi()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});
Route::get('search_poster', function (){
    if (Auth::guest()){
        $ad_spaces = Adspace::latest()->available()->poster()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }


    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



//    $articles = Article::latest()->published()->get();
//    $ad_spaces = Adspace::paginate(3);
    $ad_spaces = Adspace::latest()->available()->poster()->paginate(9);
//    $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);
    return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves','reserves_client', 'rents_client', 'sales_client'));

});

//auth route
//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//        $this->post('check_users','Auth\RegisterController@check_users')->name('check_users');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');






//owners route
Route::get('/owner/create_posts', 'OwnersPostsController@create')->middleware('subscribe_user');
Route::post('/owner', 'OwnersPostsController@store')->middleware('subscribe_user');
Route::get('/owner/my_post/{id}', 'OwnersPostsController@my_post')->middleware('subscribe_user');
Route::get('/owner/delete/{id}', 'OwnersPostsController@delete')->middleware('subscribe_user');
Route::get('/owner/{id}/edit_post', 'OwnersPostsController@edit_post')->name('edit_post')->middleware('subscribe_user');
Route::patch('/owner/{id}', 'OwnersPostsController@update_post')->name('update_post')->middleware('subscribe_user');
Route::get('/owner/my_all_post/{id}', 'OwnersPostsController@my_all_post')->middleware('subscribe_user');
Route::get('/owner/show/profile', 'OwnerController@owner_show_profile')->name('owner_show_profile')->middleware('subscribe_user');
Route::get('/owner/{id}/edit_profile', 'OwnerController@owner_edit_profile')->name('owner_edit_profile')->middleware('subscribe_user');
Route::patch('/owner/update/{id}', 'OwnerController@owner_update_profile')->name('owner_update_profile')->middleware('subscribe_user');


//show all billboard
Route::get('show_all_rented', 'OwnerController@show_all_rented')->name('show_all_rented')->middleware('subscribe_user');
Route::get('owner/show_all_sale', 'OwnerController@show_all_sale')->name('show_all_sale')->middleware('subscribe_user');



//edit rented post
Route::get('/owner/{id}/edit_rented_post', 'OwnerController@edit_rented_post')->name('edit_rented_post')->middleware('subscribe_user');
//edit sale post


Route::get('/owner/show_reserved_specific_billboard/{id}/{client_id}', 'OwnerController@show_reserved_specific_billboard')->name('show_reserved_specific_billboard')->middleware('subscribe_user');

Route::get('/owner/show_all_rented_billboard', 'OwnerController@show_all_rented_billboard')->name('show_all_rented_billboard')->middleware('subscribe_user');
//update here
Route::get('/owner/show_all_sale_billboard', 'OwnerController@show_all_sale_billboard')->name('show_all_sale_billboard')->middleware('subscribe_user');
//update here
Route::get('/owner/show_all_reserve_billboard', 'OwnerController@show_all_reserve_billboard')->name('show_all_reserve_billboard')->middleware('subscribe_user');



Route::get('/owner/show_pending_rent_specific_billboard/{billboard_id}/{rent_id}/{client_id}', 'OwnerController@show_pending_rent_specific_billboard')->name('show_pending_rent_specific_billboard')->middleware('subscribe_user');
Route::get('/owner/adspace_rent/add_to_adspace_rent/{ad_space}/{rent_id}/{client_id}', 'OwnerController@add_to_adspace_rent')->name('add_to_adspace_rent')->middleware('subscribe_user');
Route::get('/owner/rent_pending/delete_pending_rent/{ad_space}/{rent_id}/{client_id}', 'OwnerController@delete_pending_rent')->name('delete_pending_rent')->middleware('subscribe_user');



Route::get('/owner/show_pending_sale_specific_billboard/{billboard_id}/{rent_id}/{client_id}', 'OwnerController@show_pending_sale_specific_billboard')->name('show_pending_sale_specific_billboard')->middleware('subscribe_user');
Route::get('/owner/adspace_sale/add_to_adspace_sale/{ad_space}/{rent_id}/{client_id}', 'OwnerController@add_to_adspace_sale')->name('add_to_adspace_sale')->middleware('subscribe_user');
Route::get('/owner/sale_pending/delete_pending_sale/{ad_space}/{rent_id}/{client_id}', 'OwnerController@delete_pending_sale')->name('delete_pending_sale')->middleware('subscribe_user');


Route::get('/owner/show_pending_reserved_specific_billboard/{billboard_id}/{reserve_id}/{client_id}', 'OwnerController@show_pending_reserved_specific_billboard')->name('show_pending_reserved_specific_billboard')->middleware('subscribe_user');
Route::get('/owner/adspace_reserve/add_to_adspace_reserve/{ad_space}/{reserve_id}/{client_id}', 'OwnerController@add_to_adspace_reserve')->name('add_to_adspace_reserve')->middleware('subscribe_user');
Route::get('/owner/reserve_pending/delete_reserve_pending/{ad_space}/{reserve_id}/{client_id}', 'OwnerController@delete_reserve_pending')->name('delete_reserve_pending')->middleware('subscribe_user');
Route::get('/owner/make_contract', 'OwnerController@make_contract')->name('make_contract');

Route::get('/owner/ad_spaces/owner_billboard_search', function (Request $request){

    $search = $request->search;

    if (Auth::guest()){
        return redirect('/login');
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification
    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    if ($request->type!='all'){
        $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
            ->where('status', 1)
            ->where($request->type, 'like', '%' . $search . '%')
            ->paginate(9);
    }else{
        $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
            ->where('status', 1)
            ->paginate(9);
    }

//    $user = User::findOrFail(Auth::id())->ad_spaces()->latest()->available()->paginate(9);

    return view('owner.posts.my_post', compact('ad_spaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));


})->name('owner_billboard_search');

Route::get('/owner/all_ad_spaces/owner_all_billboard_search', function (Request $request){

    $search = $request->search;

    if (Auth::guest()){
        return redirect('/login');
    }

//owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
//sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
//reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


//clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
//sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
//reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();


    if ($request->type!='all'){
        $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
            ->where($request->type, 'like', '%' . $search . '%')
            ->paginate(9);
    }else{
        $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
            ->paginate(9);
    }

//        $user = User::findOrFail($id)->ad_spaces()->latest()->paginate(9);
    return view('owner.posts.my_all_post', compact('ad_spaces', 'rents', 'reserves', 'sales', 'rents_client', 'sales_client', 'reserves_client'));
});



Route::get('/owner/all_ad_spaces/owner_status_billboard_search', function (Request $request){

    $search =  $request->status;

    if (Auth::guest()){
        return redirect('/login');
    }

//owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
//sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
//reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


//clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
//sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
//reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();



        $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
            ->whereStatus($search)
            ->paginate(9);


//        $user = User::findOrFail($id)->ad_spaces()->latest()->paginate(9);
    return view('owner.posts.my_all_post', compact('ad_spaces', 'rents', 'reserves', 'sales', 'rents_client', 'sales_client', 'reserves_client'));
});



//subscription
Route::get('/owner/show_subscription', function (){

    if (Auth::guest()){
        return view('index');
    }

    //owner notification
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    //sale notification
    $sales = Sale::where('owner_id', Auth::user()->id)->get();
    //reserve notification
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


    //clients notification

    $rents_client = Rent::where('client_id', Auth::user()->id)->get();
    //sale notification
    $sales_client = Sale::where('client_id', Auth::user()->id)->get();
    //reserve notification
    $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

    return view('subscriptionplan', compact('rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
});

Route::get('/owner/subscribe/{price}/{plan}/{mo}/{user_id}', 'OwnerController@subscribe')->name('subscribe');








//client route

Route::group(['middleware' => ['is_client']], function () {

    Route::get('/client/available_post', 'ClientController@available_post');
    Route::get('/client/show/profile', 'ClientController@client_show_profile')->name('client_show_profile');
    Route::get('/client/{id}/edit_profile', 'ClientController@client_edit_profile')->name('client_edit_profile');
    Route::patch('/client/update/{id}', 'ClientController@client_update_profile')->name('client_update_profile');

    Route::get('client/show_available_rent', 'ClientController@show_available_rent')->name('show_available_rent');
    Route::get('client/create_rent/{owner_id}/{client_id}/{billboard_id}', 'ClientController@create_rent')->name('create_rent');
    Route::get('client/show_my_all_rent', 'ClientController@show_my_all_rent')->name('show_my_all_rent');
    Route::get('/client/edit_my_rented_post/{id}', 'ClientController@edit_my_rented_post')->name('edit_my_rented_post');
//udpate rented here
    Route::delete('/client/delete_my_rented_post/{id}', 'ClientController@delete_my_rented_post')->name('delete_my_rented_post');

    Route::get('/client/show_available_sales', 'ClientController@show_available_sales')->name('show_available_sales');
    Route::get('/client/create_sale/{owner_id}/{client_id}/{billboard_id}', 'ClientController@create_sale')->name('create_sale');
    Route::get('client/show_my_all_sale', 'ClientController@show_my_all_sale')->name('show_my_all_sale');
    Route::get('/client/edit_my_sale_post/{id}', 'ClientController@edit_my_sale_post')->name('edit_my_sale_post');
//update sale here
    Route::delete('/client/delete_my_sale_post/{id}', 'ClientController@delete_my_sale_post')->name('delete_my_sale_post');


    Route::get('/client/show_available_sales', 'ClientController@show_available_sales')->name('show_available_sales');
    Route::get('/client/create_sale/{owner_id}/{client_id}/{billboard_id}', 'ClientController@create_sale')->name('create_sale');
    Route::get('client/show_my_all_sale', 'ClientController@show_my_all_sale')->name('show_my_all_sale');
    Route::get('/client/edit_my_sale_post/{id}', 'ClientController@edit_my_sale_post')->name('edit_my_sale_post');
//update reserve here
    Route::delete('/client/delete_my_sale_post/{id}', 'ClientController@delete_my_sale_post')->name('delete_my_sale_post');

    Route::get('/client/reserve/{owner_id}/{client_id}/{billboard_id}', 'ClientController@reserve')->name('reserve');
    Route::get('/client/reserve_add/{owner_id}/{client_id}/{billboard_id}', 'ClientController@reserve_add')->name('reserve_add');

    Route::get('/client/show_my_all_reserve', 'ClientController@show_my_all_reserve')->name('show_my_all_reserve');
    Route::get('/client/cancel_reservation/{id}', 'ClientController@cancel_reservation')->name('cancel_reservation');

    Route::get('client/show/adspace_purchased','ClientController@adspace_purchased')->name('adspace_purchased');


    Route::get('client/show_my_all_rent/adspace_search', function (Request $request){

        $search = $request->search;

        if (Auth::guest()){
            return redirect('/login');
        }

        //owner notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


        //clients notification

        $rents_client = Rent::where('client_id', Auth::user()->id)->get();
        //sale notification
        $sales_client = Sale::where('client_id', Auth::user()->id)->get();
        //reserve notification
        $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();

        if ($request->type!='all'){
            $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
                ->where($request->type, 'like', '%' . $search . '%')
                ->paginate(9);
        }else{
            $ad_spaces = Adspace::where('owner_id', Auth::user()->id)
                ->paginate(9);
        }


        $adspaces = Rent::where('client_id', Auth::user()->id)

            ->paginate(9);
//
        return view('client.show_my_all_rent', compact('adspaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));

    })->name('adspace_search');

});

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
Route::get('/admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin_register', 'AdminAuth\RegisterController@register');
Route::get('admin/rental', 'AdminController@rental')->name('rental');
Route::get('admin/sale', 'AdminController@sale')->name('sale');
Route::get('admin/reserve', 'AdminController@reserve')->name('reserve');
Route::get('admin/subscription', 'AdminController@subscription')->name('subscription');



//testing area here

Route::get('test', function (){
    $res = Reservation::where('reserve_until','<',Carbon::now()->format('Y-m-d'))->get();

    foreach ($res as $re){
        Adspace::findOrFail($re->billboard_id)->update(['status' => 1,'reserve_until' => Carbon::now()]);
    }

    Reservation::where('reserve_until','<',Carbon::now()->format('Y-m-d'))->delete();



});


//show my all reservation
/*
Route::get('test', function (){


    $res = Reservation::where('client_id', Auth::id())
        ->where('reserve_until','>',Carbon::now()->format('Y-m-d'))
        ->get();

    foreach ($res as $re){
        $rent = Rent::where('billboard_id', $re->billboard_id)->first();
        $sale = Sale::where('billboard_id', $re->billboard_id)->first();
        if($rent == null && $sale == null){
            echo "owner_id: " . $re->owner_id . '<br>';
            echo  "client_id: " . $re->client_id . '<br>';
            echo  "billboad_id: " . $re->billboard_id . '<br>';
        }
        echo '<hr>';
    }
});



Route::get('asss', function (){
    return Auth::guard('admin')->user()->name;
});

Route::get('test_ra', function (){

    //subscription plan
    //subscribers
    //subscription end_date

    $subscriptions = Subscription::all();
    foreach ($subscriptions as $subscription ){
        foreach ($subscription->users as $user){
            echo "subscription plan: ".$subscription->plan.'<br>';
            echo "subscribers: ".$user->first_name.'<br>';
            echo "subscription end_date: ".$subscription->subscribe_end_date.'<br>';

            echo '<hr>';

        }
    }


});





Route::get('test_sb', function (){

    //check kung owner ba
    if (Auth::user()->isOwner()){
        echo "ok".'<br>';
    }


    $exists = DB::table('subscribe_user')
            ->whereUserId(Auth::user()->id)
            ->count() > 0;
    if ($exists){
        echo "ok".'<br>';
    }

    $user = App\User::findOrFail(Auth::user()->id);

    $isOk = true;
    foreach ($user->subscriptions as $subscription) {
        if ($subscription->subscribe_end_date < \Carbon\Carbon::now()){
            $isOk = false;
        }
    }

    if ($isOk){
        echo "ok";
    }

});



Route::get('/subs', function (){
    return view('subscriptionplan');
});

Route::get('show_form', function (){
    return view('example_subs');
});


Route::get('/test_status', function (){
    Adspace::findOrFail(2)->update(array('status' => 1));
});

Route::get('/test_reservation_admin', function (){

    $adspaces = Adspace::all();
//    $reservations = Reservation::where('is_seen', 1)->get();

    foreach ($adspaces as $adspace){
        foreach ($adspace->reservations as $space){

            $ads_id = $space->pivot->adspace_id;
            $reserve_id = $space->pivot->reservation_id;

            $ads = Adspace::findOrFail($ads_id);
            $reserve = Reservation::findOrFail($reserve_id);

            $user = User::findOrFail($reserve->client_id);

            echo 'Posted By: '.$ads->posted_by . '<br>';
            echo 'Reserve By: '.$user->first_name. '<br>';
            echo 'Reserve_Date: '.$reserve->reserve_date. '<br>';
            echo 'End_Reservation: '.$reserve->reserve_until. '<br>';
            echo 'type: '.$ads->advertising_type . '<br>';
            echo 'size: '.$ads->size . '<br>';
            echo 'location: '.$ads->location . '<br>';
            echo 'price: '.$ads->price . '<br>';
//            echo 'status: '.$ads->status. '<br>';

            echo '<hr>';

//            echo 'posted by: '.$ads->posted_by . '<br>';
//            echo 'rent by: '.$user->first_name. '<br>';
//            echo 'type: '.$ads->advertising_type . '<br>';
//            echo 'size: '.$ads->size . '<br>';
//            echo 'location: '.$ads->location . '<br>';
//            echo 'price: '.$ads->price . '<br>';
//            echo 'status: '.$ads->status. '<br>';


        }
    }

//    <th>Posted By</th>
//    <th>Reserve By</th>
//    <th>Reserve_Date</th>
//    <th>End_Reservation</th>
//    <th>Type</th>
//    <th>Size</th>
//    <th>Location</th>
//    <th>Price</th>
//    <th>Actions</th>




});

Route::get('/check_adspace', function (){
    $ad_spaces = Adspace::latest()->available()->get();
    foreach($ad_spaces as $ad_space){
        echo "owner id: ".$ad_space->user->id.'<br>';
        echo "client id: ".Auth::user()->id.'<br>';
        echo "billboard_id: ".$ad_space->id.'<br>';
        echo '<hr>';
    }
//    $ad_space->user->id, Auth::user()->id,$ad_space->id
});

Route::get('test_query', function (){
    $reserves = Reservation::where('owner_id', Auth::user()->id)->get();
    foreach ($reserves as $reserve){
        if ($reserve->is_seen == 0){
            echo $reserve->id.'<br>';
        }

    }

});

Route::get('/time_test', function (){
    echo Carbon\Carbon::now()->addWeeks(1).'<br>';
    echo Carbon\Carbon::now()->addWeeks(2).'<br>';
    echo Carbon\Carbon::now()->addWeeks(3).'<br>';
    return \Carbon\Carbon::now()->addMonth(1);
});

//php artisan migrate:refresh
Route::get('/test_artisan_command', function()
{
    Artisan::call('migrate:refresh');
    dd(Artisan::output());
});


//count the record of rents
Route::get('rent_record', function (){
    $adspace = Adspace::where('advertising_type', 'rent')->where('status', 0)->get();
    return $adspace->count();
});

Route::get('sale_record', function (){
    $adspace = Adspace::where('advertising_type', 'sale')->where('status', 0)->get();
    return $adspace->count();
});

Route::get('admin_rental', function (){

//    posted by, rent by, type, size, loction, price, status,
    $adspaces = Adspace::all();
    foreach ($adspaces as $adspace){
        foreach ($adspace->rents as $space){
            $ads_id = $space->pivot->adspace_id;
            $rent_id = $space->pivot->rent_id;
            $ads = Adspace::findOrFail($ads_id);
            $rents = Rent::findOrFail($rent_id);
            $user = User::findOrFail($rents->client_id);


            echo 'posted by: '.$ads->posted_by . '<br>';
            echo 'rent by: '.$user->first_name. '<br>';
            echo 'type: '.$ads->advertising_type . '<br>';
            echo 'size: '.$ads->size . '<br>';
            echo 'location: '.$ads->location . '<br>';
            echo 'price: '.$ads->price . '<br>';
            echo 'status: '.$ads->status. '<br>';

            echo '<hr>';
        }
    }

});


Route::get('notifiy_owner_rent', function (){
    $rents = Rent::where('owner_id', Auth::user()->id)->get();
    foreach ($rents as $rent){
        //id sa billboard
        //billboard_id
        //client_id
//        <a href="url('/owner/show_pending_rent_billboard', [$ad_space->pivot->adspace_id, $res->client_id])">;
//        $rent->billboard_id;
        echo $rent->billboard_id.' Billboard'.'<br>';
        echo $rent->id.' Rent'.'<br>';
        echo $rent->client_id.' Client';
    }

});

Route::get('/showimg', function (){
    return Auth::user()->photo_name;
});

Route::get('show_ang_ako_billboard_nga_rented',function (){

    $adspaces = Rent::where('owner_id', Auth::user()->id)->get();
    foreach ($adspaces as $adspace){
        foreach ($adspace->ad_spaces as $space){
            $ads_id = $space->pivot->adspace_id;
            $ads = Adspace::findOrFail($ads_id);
            echo $ads->photo_name;
        }
    }

});

//ang ako tanan nga g pang rentahan
Route::get('tanan_rentahan', function (){

    $adspaces = Rent::where('client_id', Auth::user()->id)->get();
    foreach ($adspaces as $adspace){
        foreach ($adspace->ad_spaces as $space){
            $ads_id = $space->pivot->adspace_id;
            $ads = Adspace::findOrFail($ads_id);
            echo $ads->photo_name;
        }
    }

});

Route::get('show_client_all_rent', function (){
    $adspaces = Reservation::where('client_id', Auth::user()->id)->get();
    foreach ($adspaces as $adspace){
        foreach ($adspace->ad_spaces as $space){
            $ads_id = $space->pivot->adspace_id;
            $ads = Adspace::findOrFail($ads_id);
            echo $ads->photo_name;
        }
    }

});

//e detect nako kung naa bay nag pareserve
Route::get('/reserved', function (){
    $myid = Auth::user()->id; // get my current id

});

//testing reserve and for the pivot data
Route::get('/testing_rani/{owner_id}/{client_id}/{billboard_id}', function ($owner_id, $client_id,$billboard_id ){
//    $reserve = Reservation::findOrFail($owner_id);
//    $reserve->ad_spaces()->attach($client_id);
//    1/2/2


    $d = \Carbon\Carbon::now();
    $reserve = Reservation::create(['reserve_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id]);
    $LastInsertId = $reserve->id;

    Adspace::where('id',$billboard_id)->update(['reserve'=>1, 'status'=>0]);


    $reserve_adspace = Reservation::findOrFail($LastInsertId);
    $reserve_adspace->ad_spaces()->attach($billboard_id);

//    echo Response::json(array('success' => true,'last_id'=>$LastInsertId), 200);

});

Route::get('/addreserve', function (){
    $reserve_adspace = Reservation::findOrFail(1);
    $reserve_adspace->ad_spaces()->attach(5);
});




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


*/
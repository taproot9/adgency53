<?php

namespace App\Http\Controllers;

use App\Adspace;
use App\Rent;
use App\Reservation;
use App\Sale;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Paypal;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;

class OwnerController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }

    public function owner_show_profile(){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        return view('owner.owner_show_profile', compact('user', 'rents', 'sales', 'reserves'));
    }

    public function owner_edit_profile($id){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $user = User::findOrFail($id);
        return view('owner.edit_account', compact('user', 'rents', 'sales', 'reserves'));
    }

    public function owner_update_profile(Request $request, $id){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'password' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword'
        ]);

        $user = User::findOrFail($id);
        $input = $request->all();

        //param1 - user password that has been entered on the form
        //param2 - old password hash stored in database

        if (Hash::check($request->password, $user->password)) {
            if ($file = $request->file('photo_name')){
                $name = time() . $file->getClientOriginalName();
                $file->move('user_photo', $name);
                $input['photo_name'] = $name;
            }
            $input['password'] = bcrypt($request->newpassword);
            $user->update($input);
            return redirect(route('owner_show_profile'));
        }else{
            Session::flash('wrong_old_pass', 'The old password you enter is wrong!');
            return redirect(action('OwnerController@owner_edit_profile', [$user->id]));
        }
    }

    public function show_all_rented(){


        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();


        $adspaces = Adspace::where('owner_id',Auth::user()->id)
            ->where('status',1)
            ->where('advertising_type','rent')
            ->paginate(9);

        return view('owner.show_all_rented', compact('adspaces', 'rents', 'sales', 'reserves'));

    }
    public function show_all_sale(){


        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $adspaces = Adspace::where('owner_id',Auth::user()->id)
            ->where('status',1)
            ->where('advertising_type','sale')
            ->paginate(9);
        return view('owner.show_all_sale', compact('adspaces', 'rents', 'sales', 'reserves'));
    }



    public function edit_rented_post($id){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $ad_space = Adspace::findOrFail($id);
        return view('owner.rented_edit_post', compact('ad_space', 'rents', 'sales', 'reserves'));
    }

    public function show_reserved_specific_billboard ($id,$client_id){
        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $ad_space = Adspace::findOrFail($id);
        return view('owner.show_reserved_specific_billboard', compact('ad_space', 'client_id', 'rents', 'sales', 'reserves'));
    }


    public function show_all_rented_billboard(){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();



        $adspaces = Rent::where('owner_id', Auth::user()->id)->paginate(9);
        return view('owner.show_all_rented_billboard', compact('adspaces', 'rents', 'sales', 'reserves'));
    }

    public function show_all_sale_billboard(){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $adspaces = Sale::where('owner_id', Auth::user()->id)->paginate(9);
        return view('owner.show_all_sale_billboard', compact('adspaces', 'rents', 'sales', 'reserves'));
    }

    public function show_all_reserve_billboard(){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $adspaces = Reservation::where('owner_id', Auth::user()->id)->paginate(9);
        return view('owner.show_all_reserve_billboard', compact('adspaces', 'rents', 'sales', 'reserves'));
    }

    public function show_pending_rent_specific_billboard($billboard_id,$rent_id,$client_id){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $ad_space = Adspace::findOrFail($billboard_id);
        return view('owner.show_pending_rent_specific_billboard', compact('ad_space', 'rent_id','client_id', 'rents','sales', 'reserves'));
    }

    public function add_to_adspace_rent($ad_space,$rent_id,$client_id){

//        Adspace::where('id',$billboard_id)->update(['reserve'=>1, 'status'=>0]);
        $reserve_adspace = Rent::findOrFail($rent_id);
        $reserve_adspace->is_seen = 1;
        $reserve_adspace->ad_spaces()->attach($ad_space);
        $reserve_adspace->save();
        Adspace::where('id',$ad_space)->update(['status'=>0]);
        return redirect('/');
    }

    public function show_pending_sale_specific_billboard($billboard_id,$rent_id,$client_id){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $ad_space = Adspace::findOrFail($billboard_id);
        return view('owner.show_pending_sale_specific_billboard', compact('ad_space', 'rent_id','client_id', 'rents', 'sales', 'reserves'));
    }

    public function add_to_adspace_sale($ad_space,$rent_id,$client_id){
        $reserve_adspace = Sale::findOrFail($rent_id);
        $reserve_adspace->is_seen = 1;
        $reserve_adspace->ad_spaces()->attach($ad_space);
        $reserve_adspace->save();
        Adspace::where('id',$ad_space)->update(['status'=>0]);
        return redirect('/');
    }

    public function show_pending_reserved_specific_billboard($billboard_id,$reserve_id,$client_id){

        if (Auth::guest()){
            return redirect('/login');
        }

        //rent notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $ad_space = Adspace::findOrFail($billboard_id);
        return view('owner.show_pending_reserved_specific_billboard', compact('ad_space', 'reserve_id','client_id', 'rents', 'sales', 'reserves'));
    }


    public function add_to_adspace_reserve($ad_space,$reserve_id,$client_id)
    {
        $reserve_adspace = Reservation::findOrFail($reserve_id);
        $reserve_adspace->is_seen = 1;
        $reserve_adspace->ad_spaces()->attach($ad_space);
        $reserve_adspace->save();
        Adspace::where('id', $ad_space)->update(['status' => 0]);
        return redirect('/');

    }

    public function subscribe($price, $plan , $mo){

        if ($price == null){
            return view('subscriptionplan');
        }else{

            //add to the subscription table
            $d = \Carbon\Carbon::now();
            $end_date = \Carbon\Carbon::now()->addMonth($mo);
            $subscription = Subscription::create(['plan' => $plan,'price' => $price,'subscribe_start_date' => $d,'subscribe_end_date' => $end_date]);
            $lastInsertId = $subscription->id;

            //add to the junction table
            $subs = Subscription::FindOrFail($lastInsertId);
            $subs->users()->attach(Auth::user()->id);
            $subs->save();

            return redirect('/');

        }

    }













    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

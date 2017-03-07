<?php

namespace App\Http\Controllers;

use App\Adspace;
use App\Rent;
use App\Reservation;
use App\Sale;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function available_post(){

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

        $ad_spaces = Adspace::latest()->available()->paginate(9);
        return view('test_ads', compact('ad_spaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function client_show_profile(){
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

        return view('client.show_profile',compact('rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function client_edit_profile($id){

        if (Auth::guest()){
            return redirect('/login');
        }

        $user = User::findOrFail($id);

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

        return view('client.edit_account', compact('rents', 'sales', 'reserves', 'user', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function client_update_profile(Request $request, $id){

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
                $file->move('user_photo',$name);
                $input['photo_name'] = $name;
            }
            $input['password'] = bcrypt($request->newpassword);
            $user->update($input);
            return redirect(route('client_show_profile'));
        }else{
            Session::flash('wrong_old_pass', 'The old password you enter is wrong!');
            return redirect(action('ClientController@client_edit_profile', [$user->id]));
        }
    }
    public function show_available_rent(){

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



        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'rent')->paginate(9);
        return view('client.show_available_rent', compact('adspaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function create_rent($owner_id,$client_id,$billboard_id){

        Reservation::where('billboard_id', $billboard_id)->delete();

        $d = \Carbon\Carbon::now();
        $rent = Rent::create(['rent_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id]);
        $LastInsertId = $rent->id;
        Adspace::where('id',$billboard_id)->update(['status'=>0]);
        $rent_adspace = Rent::findOrFail($LastInsertId);
        $rent_adspace->ad_spaces()->attach($billboard_id);

        return redirect(route('show_available_rent'));



//        $res = Rent::all();
//        $ok = true;
//
//        foreach ($res as $re){
//            if( ($re->billboard_id == $billboard_id) && ($re->client_id == $client_id)){
////                echo $re->billboard_id." == ". $billboard_id. " && ".$re->client_d." == ". $client_id;
//                $ok = false;
//                break;
//            }
//        }
//        if ($ok){
//
//            $d = \Carbon\Carbon::now();
//            $rent = Rent::create(['rent_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id]);
//            $LastInsertId = $rent->id;
//            Adspace::where('id',$billboard_id)->update(['reserve'=>1, 'status'=>0]);
//            $rent_adspace = Rent::findOrFail($LastInsertId);
//            $rent_adspace->ad_spaces()->attach($billboard_id);
//            return redirect(route('show_available_rent'));
//
//        }else{
//            return redirect(route('show_available_rent'));
//        }


        //mo notify ang owner
//        $LastInsertId = $reserve->id;
//        Adspace::where('id',$billboard_id)->update(['reserve'=>1, 'status'=>0]);
//        $reserve_adspace = Rent::findOrFail($LastInsertId);
//        $reserve_adspace->ad_spaces()->attach($billboard_id);



    }

    public function show_my_all_rent(){

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


        $adspaces = Rent::where('client_id', Auth::user()->id)->paginate(9);
//        $adspaces = Reservation::where('client_id', Auth::user()->id)->get();
//
//        foreach ($adspaces as $adspace){
//            foreach ($adspace->ad_spaces as $space){
//                $ads_id = $space->pivot->adspace_id;
//                $ads = Adspace::findOrFail($ads_id);
//                echo $ads->photo_name;
//            }
//        }
        return view('client.show_my_all_rent', compact('adspaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function edit_my_rented_post($id){

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

        $ad_space = Adspace::findOrFail($id);
        return view('client.edit_my_rented_post', compact('ad_space','rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function delete_my_rented_post($id){
        Rent::where('billboard_id',$id)->delete();
        return redirect('client/show_my_all_rent');
    }

    public function show_available_sales(){
//        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'sale')->whereReserve(0)->paginate(2);
//        return view('client.show_available_sales', compact('adspaces'));

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


        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'sale')->paginate(9);
        return view('client.show_available_sales', compact('adspaces', 'rents', 'reserves', 'sales', 'rents_client', 'sales_client', 'reserves_client'));

    }

    public function create_sale($owner_id,$client_id,$billboard_id){

        Reservation::where('billboard_id', $billboard_id)->delete();

        $d = \Carbon\Carbon::now();
        $sale = Sale::create(['sale_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id]);
        $LastInsertId = $sale->id;
        Adspace::where('id',$billboard_id)->update(['status'=>0]);
        $sale_adspace = Sale::findOrFail($LastInsertId);
        $sale_adspace->ad_spaces()->attach($billboard_id);
        return redirect(route('show_available_sales'));
    }

    public function show_my_all_sale(){
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


        $adspaces = Sale::where('client_id', Auth::user()->id)->paginate(9);

        return view('client.show_my_all_sale', compact('adspaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function edit_my_sale_post($id){

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


        $ad_space = Adspace::findOrFail($id);
        return view('client.edit_my_sale_post', compact('ad_space', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function delete_my_sale_post($id){
        Sale::where('billboard_id',$id)->delete();

        return redirect('client/show_my_all_sale');
    }




    public function reserve($owner_id,$client_id,$billboard_id){

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

        return view('client.reserve', compact('owner_id', 'client_id', 'billboard_id', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));

    }



    public function reserve_add($owner_id,$client_id,$billboard_id){

        //owner notification
        $rents = Rent::where('owner_id', Auth::user()->id)->get();
        //sale notification
        $sales = Sale::where('owner_id', Auth::user()->id)->get();
        //reserve notification
        $reserves = Reservation::where('owner_id', Auth::user()->id)->get();

        $ad_spaces = Adspace::latest()->available()->paginate(9);


        //clients notification
        $rents_client = Rent::where('client_id', Auth::user()->id)->get();
        //sale notification
        $sales_client = Sale::where('client_id', Auth::user()->id)->get();
        //reserve notification
        $reserves_client = Reservation::where('client_id', Auth::user()->id)->get();


        $billboard = Adspace::where('id', $billboard_id)->first();

        $d = \Carbon\Carbon::now();
        $reserve = Reservation::create(['reserve_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id, 'reserve_until'=>$billboard->reserve_until]);
        $LastInsertId = $reserve->id;

        Adspace::where('id',$billboard_id)->update(['status'=>0]);
        $reservation = Reservation::findOrFail($LastInsertId);
        $reservation->ad_spaces()->attach($billboard_id);

        return redirect()->back();


//        $res = Reservation::all();
//        $ok = true;
//
//        foreach ($res as $re){
//            if( ($re->billboard_id == $billboard_id) && ($re->client_id == $client_id)){
//                $ok = false;
//                break;
//            }
//        }
//
//        $reserve_until = null;
//        if ($billboard->reserve_until == 1){
//            $reserve_until =  Carbon::now()->addWeeks(1);
//        }else if ($billboard->reserve_until == 2){
//            $reserve_until =  Carbon::now()->addWeeks(2);
//        }else if ($billboard->reserve_until == 3){
//            $reserve_until =  Carbon::now()->addWeeks(3);
//        }else if ($billboard->reserve_until == 4){
//            $reserve_until = Carbon::now()->addMonth(1);
//        }else{
//            $reserve_until = null;
//        }
//
//        if ($ok == true){
//            $d = \Carbon\Carbon::now();
//            $reserve = Reservation::create(['reserve_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id, 'reserve_until'=>$reserve_until]);
//            $LastInsertId = $reserve->id;
//
//            Adspace::where('id',$billboard_id)->update(['status'=>0]);
//            $reservation = Reservation::findOrFail($LastInsertId);
//            $reservation->ad_spaces()->attach($billboard_id);
//
//            return view('test_ads', compact('rents', 'rents_client', 'sales', 'sales_client', 'reserves', 'reserves_client', 'ad_spaces'));
//        }else{
//            return view('test_ads', compact('rents', 'rents_client', 'sales', 'sales_client', 'reserves', 'reserves_client', 'ad_spaces'));
//        }

    }

    public function show_my_all_reserve(){

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



        $adspaces = Reservation::where('client_id', Auth::id())
                        ->where('reserve_until','>',Carbon::now()->format('Y-m-d'))
                        ->paginate(12);

        return view('client.show_my_all_reserve', compact('adspaces', 'rents', 'sales', 'reserves', 'rents_client', 'sales_client', 'reserves_client'));
    }

    public function cancel_reservation($id){
        Reservation::where('billboard_id', $id)->where('is_seen', 1)->delete();
        Adspace::whereId($id)->update(['status' => 1]);
        return redirect(url('/client/available_post'));
    }
}

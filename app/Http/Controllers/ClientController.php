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
//        $ad_spaces = Adspace::latest()->available()->notreserved()->paginate(2);
        $ad_spaces = Adspace::latest()->available()->paginate(9);
        return view('test_ads', compact('ad_spaces'));
    }

    public function client_show_profile(){
        return view('client.show_profile');
    }

    public function client_edit_profile($id){
        $user = User::findOrFail($id);
        return view('client.edit_account', compact('user'));
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
//        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'rent')->whereReserve(0)->paginate(2);
        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'rent')->paginate(9);
        return view('client.show_available_rent', compact('adspaces'));
    }

    public function create_rent($owner_id,$client_id,$billboard_id){
        $res = Rent::all();
        $ok = true;

        foreach ($res as $re){
            if( ($re->billboard_id == $billboard_id) && ($re->client_id == $client_id)){
//                echo $re->billboard_id." == ". $billboard_id. " && ".$re->client_d." == ". $client_id;
                $ok = false;
                break;
            }
        }
        if ($ok){
            $d = \Carbon\Carbon::now();
            $reserve = Rent::create(['rent_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id]);
            return redirect(route('show_available_rent'));
        }else{
            return redirect(route('show_available_rent'));
        }


        //mo notify ang owner
//        $LastInsertId = $reserve->id;
//        Adspace::where('id',$billboard_id)->update(['reserve'=>1, 'status'=>0]);
//        $reserve_adspace = Rent::findOrFail($LastInsertId);
//        $reserve_adspace->ad_spaces()->attach($billboard_id);



    }

    public function show_my_all_rent(){
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
        return view('client.show_my_all_rent', compact('adspaces'));
    }

    public function edit_my_rented_post($id){
        $ad_space = Adspace::findOrFail($id);
        return view('client.edit_my_rented_post', compact('ad_space'));
    }

    public function delete_my_rented_post($id){
        Rent::where('billboard_id',$id)->delete();
        return redirect('client/show_my_all_rent');
    }

    public function show_available_sales(){
//        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'sale')->whereReserve(0)->paginate(2);
//        return view('client.show_available_sales', compact('adspaces'));

        $adspaces = Adspace::where('status', 1)->where('advertising_type', 'sale')->paginate(9);
        return view('client.show_available_sales', compact('adspaces'));

    }

    public function create_sale($owner_id,$client_id,$billboard_id){

        $res = Sale::all();
        $ok = true;

        foreach ($res as $re){
            if( ($re->billboard_id == $billboard_id) && ($re->client_id == $client_id)){
//                echo $re->billboard_id." == ". $billboard_id. " && ".$re->client_d." == ". $client_id;
                $ok = false;
                break;
            }
        }
        if ($ok){
            $d = \Carbon\Carbon::now();
            $reserve = Sale::create(['sale_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id]);
            return redirect(route('show_available_sales'));
        }else{
            return redirect(route('show_available_sales'));
        }


    }
    public function show_my_all_sale(){
        $adspaces = Sale::where('client_id', Auth::user()->id)->paginate(9);
        return view('client.show_my_all_sale', compact('adspaces'));
    }

    public function edit_my_sale_post($id){
        $ad_space = Adspace::findOrFail($id);
        return view('client.edit_my_sale_post', compact('ad_space'));
    }

    public function delete_my_sale_post($id){
        Sale::where('billboard_id',$id)->delete();
        return redirect('client/show_my_all_sale');
    }




    public function reserve($owner_id,$client_id,$billboard_id){

        return view('client.reserve', compact('owner_id', 'client_id', 'billboard_id'));

//        $reserve_adspace = Sale::findOrFail($rent_id);
//        $reserve_adspace->is_seen = 1;
//        $reserve_adspace->ad_spaces()->attach($ad_space);
//        $reserve_adspace->save();
//        Adspace::where('id',$ad_space)->update(['status'=>0]);
//        return redirect('/');
//
//        return redirect(route('show_available_sales'));
    }



    public function reserve_add($owner_id,$client_id,$billboard_id, Request $request){

        $res = Reservation::all();
        $ok = true;

        foreach ($res as $re){
            if( ($re->billboard_id == $billboard_id) && ($re->client_id == $client_id)){
//                echo $re->billboard_id." == ". $billboard_id. " && ".$re->client_d." == ". $client_id;
                $ok = false;
                break;
            }
        }

        $reserve_until = "";
        if ($request->reserve_until == 1){
            $reserve_until =  Carbon::now()->addWeeks(1);
        }else if ($request->reserve_until == 2){
            $reserve_until =  Carbon::now()->addWeeks(2);
        }else if ($request->reserve_until == 3){
            $reserve_until =  Carbon::now()->addWeeks(3);
        }else if ($request->reserve_until == 4){
            $reserve_until = Carbon::now()->addMonth(1);
        }

//        return response()->json($ok);

        if ($ok == true){
            $d = \Carbon\Carbon::now();
            $reserve = Reservation::create(['reserve_date'=>$d,'owner_id'=>$owner_id,'client_id'=>$client_id, 'billboard_id'=>$billboard_id, 'reserve_until'=>$reserve_until]);
            return redirect('/');
        }else{
            return redirect('/');
        }


    }

    public function show_my_all_reserve(){
        $adspaces = Reservation::where('client_id', Auth::user()->id)->paginate(12);
        return view('client.show_my_all_reserve', compact('adspaces'));
    }



























    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

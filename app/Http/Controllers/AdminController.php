<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adspace;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{



    public function showProfile(){
        return view('admin.admin_show_profile');
    }


    public function editProfile($id){
//        $header = "Edit Profile";

//        $roles = Role::lists('name', 'id')->all();

//        return view('admin.edit', compact('user', 'roles', 'header'));

        $user = Admin::findOrFail($id);
        return view('admin.edit_profile', compact('user'));
    }

    public function update_profile(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword'
        ]);

        $admin_user = Admin::findOrFail($id);
        $input = $request->all();

        //param1 - user password that has been entered on the form
        //param2 - old password hash stored in database

        if (Hash::check($request->password, $admin_user->password)) {
            if ($file = $request->file('photo_name')){
                $name = time() . $file->getClientOriginalName();
                $file->move('admin_photo', $name);
                $input['photo_name'] = $name;
            }
            $input['password'] = bcrypt($request->newpassword);
            $admin_user->update($input);
            return redirect('admin_show_profile');
        }else{
            Session::flash('wrong_old_pass', 'The old password you enter is wrong!');
            return redirect(action('AdminController@editProfile', [$admin_user->id]));

        }
    }

    public function users_account(){
        $users = User::all();
         return view('admin.accounts', compact('users'));
    }

    public function all_adspace(){
         $ad_spaces  = Adspace::all();
         return view('admin.all_ad_space' , compact('ad_spaces'));
    }

    public function rental(){
        $ad_spaces = Adspace::all();
        return view('admin.rental', compact('ad_spaces'));
    }

    public function sale(){
        $ad_spaces = Adspace::all();
        return view('admin.sale', compact('ad_spaces'));
    }

    public function reserve(){
        $ad_spaces = Adspace::all();
        $reservations = Reservation::where('is_seen', 1)->get();
        return view('admin.reserve', compact('ad_spaces', 'reservations'));
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

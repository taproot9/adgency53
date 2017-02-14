<?php

namespace App\Http\Controllers;

use App\Adspace;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{




    public function owner_show_profile(){
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return view('owner.owner_show_profile', compact('user'));
    }

    public function owner_edit_profile($id){
        $user = User::findOrFail($id);
        return view('owner.edit_account', compact('user'));
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
                $file->move('admin_photo', $name);
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
        $adspaces = Adspace::where('status', 0)->where('advertising_type', 'rent')->paginate(1);
        return view('owner.show_all_rented', compact('adspaces'));
    }


    public function edit_rented_post($id){
        $ad_space = Adspace::findOrFail($id);
        return view('owner.rented_edit_post', compact('ad_space'));
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

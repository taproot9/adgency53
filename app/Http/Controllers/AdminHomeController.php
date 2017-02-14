<?php

namespace App\Http\Controllers;

use App\Adspace;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index(){

        if(Auth::guard('admin')->check()){
            $users = User::count();
            $ad_spaces = Adspace::count();
            return view('admin.index', compact('users', 'ad_spaces'));
        }else{
            return redirect('/admin_login');
        }

    }
}

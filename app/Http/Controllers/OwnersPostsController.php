<?php

namespace App\Http\Controllers;

use App\Adspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnersPostsController extends Controller
{

    public function index()
    {
        //view all adspace
    }

    public function show_ads(){
        $ad_spaces = Adspace::all();
        return view('test_ads', compact('ad_spaces'));
    }

    public function create()
    {
        return view('owner.posts.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['owner_id'] = Auth::user()->id;
        $input['posted_by'] = Auth::user()->first_name;

        $user = Auth::user();

        if ($file = $request->file('photo_name')){
            $name = time() . $file->getClientOriginalName();
            $file->move('post_owner_images', $name);
            $input['photo_name'] = $name;
        }

        $user->ad_spaces()->create($input);
        return redirect('/');

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

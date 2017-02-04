<?php

namespace App\Http\Controllers;

use App\Adspace;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        return redirect('owner/my_post/'.Auth::user()->id);
//        return redirect('/');

    }


    public function my_post($id){
//        $ad_spaces = Adspace::latest()->paginate(2);

        $user = User::findOrFail($id)->ad_spaces()->latest()->available()->notreserved()->paginate(2);


        return view('owner.posts.my_post', compact('user'));
    }

    public function my_all_post($id){
         $user = User::findOrFail($id)->ad_spaces()->latest()->paginate(2);
         return view('owner.posts.my_all_post', compact('user'));
    }


    public function delete($id){
        $ad_space = Adspace::findOrFail($id);

        unlink(public_path($ad_space->photo_name));
//        unlink(public_path(). $post->photo->file);

//        unlink(public_path('file/to/delete'));

        $ad_space->delete();

        Session::flash('deleted_post', 'The post has been deleted');

        return redirect('owner/my_post/'.Auth::user()->id);
    }

    public function edit_post($id){

        $ad_space = Adspace::findOrFail($id);

//        $categories = Category::lists('name', 'id')->all();


//        return view('admin.posts.edit', compact('post', 'categories'));

        return view('owner.posts.edit', compact('ad_space'));
    }

    public function update_post(Request $request, $id){

        $input = $request->all();

        if ($file = $request->file('photo_name')){  //ga detect if na exists naba ni xa
            $name = time() . $file->getClientOriginalName(); //get the name of file concat with time
            $file->move('post_owner_images', $name); //move ang file dd2 sa public directory dayun mag create sa directory name images
            $input['photo_name'] = $name;
        }

        Auth::user()->ad_spaces()->whereId($id)->first()->update($input);

        return redirect('owner/my_post/'.Auth::user()->id);

//        return redirect('/');

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

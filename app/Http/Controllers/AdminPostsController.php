<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminPostsController extends Controller
{
//    public function index()
//    {
//        return view('admin.posts.create');
//    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        //validate the request
        request()->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpeg,bmp,png,gif'
        ]);

        $input = request()->all();
        //check to see if the request has a file
        if($file  = request()->file('image'))
        {
            //append the filename a timestamp
            $filename = time().$file->getClientOriginalName();
            $file->move('images/posts',$filename);
            $input['image'] = $filename;
        }
        //make a unique slug from title
        $input['slug'] =Post::makeSlugFromTitle(request()->title);
        auth()->user()->posts()->create($input);

        return back();

    }

}

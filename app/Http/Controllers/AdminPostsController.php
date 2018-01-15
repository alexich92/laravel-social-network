<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Post;
use App\Section;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::paginate(20));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create') ->with('sections',Section::all());;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'title'       =>'required',
           'image'       =>'required|mimes:jpeg,bmp,png,gif',
           'sections'    =>'required'
       ]);
        $input = $request->all();

        if($file  = $request->file('image'))
        {

            $filename = time().$file->getClientOriginalName();
            $file->move('images/posts',$filename);
            $input['image'] = $filename;
        }

        $input['slug'] =Post::makeSlugFromTitle($request->title);
        $post =  auth()->user()->posts()->create($input);
        $post->sections()->attach($request->sections);

        Session::flash('success','Post created successfully');
        return redirect()->route('posts.index');


    }



    public function showSinglePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $next_id = Post::where('id','<',$post->id)->max('id');
        return view('post')->with('post',$post)
                           ->with('next',Post::find($next_id));
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
        $post=Post::find($id);
        unlink(public_path('images/posts/' . $post->image));
        $post->delete();
        Session::flash('success','Post deleted!');
        return redirect()->back();
    }
}

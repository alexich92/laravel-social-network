<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Session;
use File;

class AdminSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sections.index')->with('sections',Section::all());
    }


    public function showSectionPosts($section_slug ='trending')
    {
        $section = Section::where('slug',$section_slug)->first();
        if(!$section){
            abort(404);
        }
        return view('section_posts')->with('section',$section);

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->all();
        $this->validate($request,[
            'name'=>'required|unique:sections',
            'image'=>'required|image|mimes:jpeg,bmp,png,gif',
            'description'=>'required'
        ]);
//        request()->validate([
//            'name'=>'required|unique:sections',
//            'slug'=>str_slug($request->name),
//            'image'=>'required|mimes:jpeg,bmp,png,gif',
//            'description'=>'required'
//        ]);

        //check to see if the request has a file
        if($file  = request()->file('image'))
        {
            //append the filename a timestamp
            $filename = time().$file->getClientOriginalName();
            $file->move('images/sections',$filename);
            $input['image'] = $filename;
        }

        $input['slug'] =str_slug($request->name);

        Section::create($input);
        Session::flash('success','Section created!');
        return back();
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
        $section=Section::find($id);
        unlink(public_path('/images/sections/' . $section->image));
        $section->delete();
        Session::flash('success','Section deleted');
        return redirect()->back();
    }
}

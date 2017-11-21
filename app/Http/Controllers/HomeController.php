<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $section = Section::where('slug','trending')->first();
//        if(!$section){
//            abort(404);
//        }
//        return view('section_posts')->with('section',$section);
    }
}

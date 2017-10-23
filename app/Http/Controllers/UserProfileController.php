<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function showUserPosts($slug)
    {
        return view('user_profile.posts')->with('user',User::where('name',$slug)->first());
    }

}

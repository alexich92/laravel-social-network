<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function showUserPosts($slug)
    {
        return view('user_profile.posts')->with('user',User::where('name',$slug)->first());
    }

    public function showUserOverview($slug)
    {
        $commentedPosts = Post::has('commentedByUser')->get();
        $liked_posts = Post::has('likedByUser')->get();
        $posts = $commentedPosts->merge($liked_posts);
        //dd($posts);
        // Debugbar::info($posts);
        $user = User::where('name',$slug)->first();
        return view('user_profile.overview')->with('user',$user)
            ->with('posts',$posts);
    }

    public function showUserUpvotes($slug)
    {
        $posts = Post::has('likedByUser')->get();
        return view('user_profile.upvotes')->with('user',User::where('name',$slug)->first())
                                                ->with('posts',$posts);
    }

    public function showUserComments($slug)
    {
       $posts = Post::has('commentedByUser')->get();
        return view('user_profile.comments')->with('user',User::where('name',$slug)->first())
            ->with('posts',$posts);
    }

}

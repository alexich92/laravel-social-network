<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function showUserPosts($username)
    {
        $user =  User::where('username',$username)->first();
        if(!$user){
            abort(404);
        }
        return view('user_profile.posts')->with('user',$user);
    }

    public function showUserOverview($username)
    {
        $user =  User::where('username',$username)->first();
        if(!$user){
            abort(404);
        }
        $commentedPosts = Post::has('commentedByUser')->get();
        $liked_posts = Post::has('likedByUser')->get();
        $posts = $commentedPosts->merge($liked_posts);

        return view('user_profile.overview')->with('user',$user)
            ->with('posts',$posts);
    }

    public function showUserUpvotes($username)
    {
       $user =  User::where('username',$username)->first();
        if(!$user){
            abort(404);
        }
        $posts = Post::has('likedByUser')->get();
        return view('user_profile.upvotes',compact('user','posts'));
    }

    public function showUserComments($username)
    {
        $user =  User::where('username',$username)->first();
        if(!$user){
            abort(404);
        }
       $posts = Post::has('commentedByUser')->get();
        return view('user_profile.comments')->with('user',$user)
            ->with('posts',$posts);
    }

}

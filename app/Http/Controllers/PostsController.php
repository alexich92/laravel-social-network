<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\RepliedToPost;
use App\Post;
use Session;
use Auth;
use App\Like;
use Validator;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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


    // validate the image from upload post form
    public function validate_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,bmp,png,gif',
        ]);

        if ($validator->passes())
        {
            return response()->json(['success' => 'Image ok']);

        }else{
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }


    //validate the input title from the uploaded post form
    public function validate_title(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:6',
        ]);

        if ($validator->passes())
        {
            return response()->json(['success' => 'Title ok']);

        }else{
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }


    // store a new post
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,bmp,png,gif',
            'title' =>'required|min:6'
        ]);


        if ($validator->passes())
        {
            $input = $request->all();

            if($file  = $request->file('image'))
            {

                $filename = time().$file->getClientOriginalName();
                $file->move('images/posts',$filename);
                $input['image'] = $filename;
            }

            $input['slug'] =Post::makeSlugFromTitle($request->title);
            $post =  auth()->user()->posts()->create($input);
            $post->sections()->attach([3,$request->section]);
            Like::create([
                'post_id'=>$post->id,
                'user_id'=>$post->user_id,
                'username'=>$post->user->username,
                'like' =>1
            ]);

            return response()->json(['success' => 'OK']);

        }else{
            return response()->json(['error' => 'Something went wrong!Try again.']);
        }


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(!$post){
            abort(404);
        }
        return view('posts.singlePost')->with('post',$post);

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

    public function search_posts()
    {
        if(empty(request('query'))){
            return back();
        }
        $posts = Post::where('title','like','%' . request('query') . '%')->get();
        return view('search_results')->with('posts',$posts);
    }

    public function likePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] ==='true' ? true : false;


        $update = false;
        $post = Post::find($post_id);

        if(!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id',$post_id)->first();
        //check to see if if the post is already liked or disliked
        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                // if the post is liked and the button like is pressed again remove the point
                if($is_like){
                    $post->points -=1;
                    $post->update();
                }else{
                    // if the post is disliked and the button dislike is pressed again add the point
                    $post->points +=1;
                    $post->update();
                }
                return null;
            }
        }else{
            $like = new Like();
            $post->user->notify(new RepliedToPost($post,'upvote'));
        }
        $like->like = $is_like;
        $like->username = $user->username;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if($update){
            $like->update();
            if($is_like){
                // if the post is disliked and we press like add 2 points
                $post->points +=2;
                $post->update();
            }else{
                // if the post is liked and we press dislike subtract 2 points
                $post->points -=2;
                $post->update();
            }
        }else{
            if($is_like){
                $like->save();
                // if none of the buttons are pressed and we press the like button add a point
                $post->points +=1;
                $post->update();
            }else{
                $like->save();

                // if none of the buttons are pressed and we press the dislike button subtract a point
                $post->points -=1;
                $post->update();

            }


        }
        return null;
    }
    
    public function getpoints(Request $request)
    {
        $post = Post::find($request['postId']);
        return response()->json($post->points);
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
        $post->delete();
        unlink(public_path('images/posts/' . $post->image));
        Session::flash('success','Post deleted!');
        return redirect()->route('home');
    }
}

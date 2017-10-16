<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentReply;
use App\Comment;
use Session;

class CommentRepliesController extends Controller
{
    //create a reply
    public function createReply(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:2'
        ]);
        $data = [
            'comment_id' =>$request->comment_id,
            'author'  =>auth()->user()->name,
            'body'    =>$request->body,
            'image'   =>auth()->user()->avatar
        ];
        CommentReply::create($data);
        return redirect()->back();
    }

    //show all replies for a particular comment
    public function showReplies($id)
    {
        $comment = Comment::findOrFail($id);
        $replies =$comment->replies;
        return view('admin.comments.replies.show',compact('replies'));
    }

    //destroy a reply
    public function destroy($id)
    {
        CommentReply::destroy($id);
        Session::flash('success','Reply deleted!');
        return redirect()->back();
    }

}

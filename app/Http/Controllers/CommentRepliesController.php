<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentReply;

class CommentRepliesController extends Controller
{
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

}

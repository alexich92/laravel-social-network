<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['body','image','author','comment_id'];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

}



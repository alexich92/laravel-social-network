<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id','avatar','author','body','user_id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    //a comment may have many replies
    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

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
}

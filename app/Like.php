<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = ['user_id','post_id','username','like'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}

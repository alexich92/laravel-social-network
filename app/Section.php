<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name'];

    //a section has many posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

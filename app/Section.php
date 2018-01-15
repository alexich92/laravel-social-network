<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name','slug','image','description'];

    //a section has many posts
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}

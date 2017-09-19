<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['user_id','slug','title','image'];


    //a post belongs to an user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //every post must have a unique slug
    public static function makeSlugFromTitle($title)
    {
        $slug = str_slug($title);

        $count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    //a post belongs to many sections
    public function sections()
    {
        return $this->belongsToMany('App\Section');
    }
}

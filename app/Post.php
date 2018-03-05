<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable=['user_id','slug','title','image'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($post){
            $post->sections()->detach();
            $post->likes()->delete();
            $post->reports()->delete();
        });

    }


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

    //a post have many comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    //a post have many likes
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    //return all posts that are liked by the user
    public function likedByUser()
    {
        return $this->likes()->where('username', request('username'))->where('like',1);
    }


    //return all posts that where the user commented
    public function commentedByUser()
    {
        return $this->comments()->where('author', request('username'));
    }
    //a post can have many reports
    public function reports()
    {
        return $this->hasMany('App\PostReports');
    }

}

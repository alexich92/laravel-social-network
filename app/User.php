<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','gender','birthday','description','avatar','country','hide_upvotes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','isAdmin'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    //check to see if the user is an admin
    public function isAdmin()
    {
        if($this->isAdmin){
            return true;
        }
            return false;
    }
    //generate unique username
    static public function getUsername($name) {
        $username = str_slug($name);
        $count  = User::whereRaw("username REGEXP '^{$username}(-[0-9]*)?$'")->count();
        return $count ? "{$username}{$count}" : $username;
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

}

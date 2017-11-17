<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostReports extends Model
{
protected $fillable =['post_id','report_id','user_id'];

public function user()
{
    return $this->belongsTo('App\User');
}

public function report()
{
    return $this->belongsTo('App\Report');
}

public function post()
{
    return $this->belongsTo('App\Post');
}
}

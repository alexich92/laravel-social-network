<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostReports extends Model
{
protected $fillable =['post_id','report_id','user_id'];
}

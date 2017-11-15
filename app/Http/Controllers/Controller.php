<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Post;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $user;
    private $random_posts;
    private $reports;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->reports = Report::all();
            $this->user = auth()->user();
            $this->random_posts =  Post::where('points','>=',1)->inRandomOrder()->limit(10)->get();
            view()->share('user', $this->user);
            view()->share('random_posts', $this->random_posts);
            return $next($request);
        });
    }
}

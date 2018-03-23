<?php

namespace App\Providers;

use App\Report;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Section;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('sections',Section::all());
        view()->share('reports',Report::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

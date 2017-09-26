<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('layouts.master_admin');
    });
    Route::get('users', 'AdminUsersController@index')->name('users.index');
    Route::resource('posts','AdminPostsController');
    Route::resource('sections','AdminSectionsController');
});

Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/account','UserSettingsController@showAccountView')->name('user.account');
    Route::patch('/account','UserSettingsController@updateAccount')->name('user.updateAccount');
    Route::get('/password','UserSettingsController@showPasswordView')->name('user.password');
    Route::patch('/password','UserSettingsController@updatePassword')->name('user.updatePassword');

});

//Route::middleware('auth')->group(function () {
//    Route::get('/u/{user}','UserSettingsController@showPasswordView')->name('user.profile');
//});


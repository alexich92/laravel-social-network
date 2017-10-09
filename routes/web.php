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
Route::get('/post/{slug}', 'PostsController@show')->name('post.single');

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
    Route::get('/profile','UserSettingsController@showProfileView')->name('user.profile');
    Route::patch('/profile','UserSettingsController@updateProfile')->name('user.updateProfile');

});

Route::middleware('auth')->group(function () {
    //Route::get('/u/{user}','UserSettingsController@showPasswordView')->name('user.profile');
    Route::get('/member/delete/','UserSettingsController@showDeleteUserView')->name('member.delete');
    Route::delete('/member/delete/{id}','UserSettingsController@destroy')->name('user.destroy');
    Route::post('/post/{post_id}/comment' ,'PostCommentsController@store')->name('comment.store');
});


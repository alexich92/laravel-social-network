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
Route::get('/search','PostsController@search_posts')->name('post.search');

Route::get('/u/{slug}/overview','UserProfileController@showUserOverview')->name('overview');
Route::get('/u/{slug}/posts','UserProfileController@showUserPosts')->name('posts');
Route::get('/u/{slug}/likes','UserProfileController@showUserUpvotes')->name('upvotes');
Route::get('/u/{slug}/comments','UserProfileController@showUserComments')->name('comments');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('layouts.master_admin');
    });
    Route::get('users', 'AdminUsersController@index')->name('users.index');
    Route::resource('posts','AdminPostsController');
    Route::resource('sections','AdminSectionsController');
    Route::get('comments','PostCommentsController@index')->name('comments.index');
    Route::delete('comments/{id}','PostCommentsController@destroy')->name('comments.destroy');
    Route::get('post/{slug}/comments','PostCommentsController@show')->name('post.comments');
    Route::get('post/comment/replies/{id}','CommentRepliesController@showReplies')->name('comment.replies');
    Route::delete('post/comment/reply/{id}','CommentRepliesController@destroy')->name('replies.destroy');
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
    Route::post('comment/reply','CommentRepliesController@createReply');
    Route::delete('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::post('/like','PostsController@likePost')->name('like');

});


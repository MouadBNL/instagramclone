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

use App\Mail\WelcomeMail;

Route::get('/', 'PostController@index')->name('post.index');

Auth::routes();

Route::get('/email', function () {
    return new WelcomeMail();
});


Route::middleware(['auth'])->group(function () {

    Route::post('/post', 'PostController@store')->name('post.store');
    Route::get('/post/create', 'PostController@create')->name('post.create');

    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile/', 'ProfileController@update')->name('profile.update');

    Route::post('follow/{user}', 'FollowController@store');

});
Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('posts','PostController@index')->name('posts.index');
Route::get('posts/create','PostController@create')->name('posts.create');
Route::post('posts','PostController@store')->name('posts.store');
Route::get('posts/{post}','PostController@show')->name('posts.show');
Route::get('posts/{post}/edit','PostController@edit')->name('posts.edit');
Route::PATCH('posts/{post}','PostController@update')->name('posts.update');
Route::delete('posts/{post}','PostController@destroy')->name('posts.destroy');

Route::resource('comments','CommentController');

Route::post('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('posts/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');



<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PagesController@getIndex')->name('home');

Route::get('/about','PagesController@getAbout');

Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');

Route::resource('/posts','PostController');
Route::get('blog','BlogController@index')->name('blog.index');
Route::get('blog/{slug}','BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');

Route::auth();
Route::get('/dashboard', 'HomeController@index');
Route::resource('/category','CategoryController',['except'=>['create','edit','update','show']]);
Route::resource('/tag','TagController',['except'=>['create']]);

// comments routes

Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit','CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}','CommentsController@update')->name('comments.update');
Route::delete('comments/{id}','CommentsController@destroy')->name('comments.destroy');

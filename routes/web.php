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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');

Route::get('/posts/search', 'PostController@search')->name('posts.search');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit')->middleware('auth');

Route::resource('/posts', 'PostController',  ['except' => ['index','edit']]);
Route::resource('/users', 'UserController');
Route::resource('/comments', 'CommentController')->middleware('auth');


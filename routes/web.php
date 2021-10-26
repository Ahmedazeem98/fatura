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


Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['middleware' => ['auth']], function (){

    Route::get('/','PostController@index')->name('blog.index');

        Route::resource('posts','PostController')->except(['show']);
});

// add middleware admin
Route::group(['middleware' => ['auth', 'admin'],'prefix' => 'admin'], function (){

    Route::resource('users','UserController')->except(['show','create','store']);
});

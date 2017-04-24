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

Route::get('/home', 'HomeController@index');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/store', 'PostController@store');
Route::get('/posts/edit/{id}', 'PostController@edit');
Route::delete('/posts/destroy/{id}', 'PostController@destroy');
Route::post('/posts/update/{id}', 'PostController@update');
Route::get('/GrantRole/{id}', 'PostController@GrantRole');

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function() {
    Route::get('/posts', 'ApiPostController@index');
    Route::get('/posts/create', 'ApiPostController@create');
    Route::post('/posts/store', 'ApiPostController@store');
    Route::get('/posts/edit/{id}', 'ApiPostController@edit');
    Route::delete('/posts/destroy/{id}', 'ApiPostController@destroy');
    Route::post('/posts/update/{id}', 'ApiPostController@update');
    Route::get('/posts/{id}', 'ApiPostController@show');
});

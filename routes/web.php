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

// message
Route::post('/message/{article_id}', 'MessageController@store');

Route::get('/message/delete/{article_id}/{message_id}', 'MessageController@destroy');

//article
Route::group( ['prefix' => 'article', 'middleware' => 'auth'], function() {
    Route::post('store', 'ArticleController@store');

    Route::post('update/{id}', 'ArticleController@update');

    Route::post('{id}/delete', 'ArticleController@destroy');

    Route::get('', 'ArticleController@index');

    Route::get('create', 'ArticleController@create');

    Route::get('{id}/edit', 'ArticleController@edit');

    Route::get('/catagory/{catagory}', 'ArticleController@catagory');

    Route::get('/search', 'ArticleController@search');
    
    Route::get('{id}', 'ArticleController@show');
});

//user
Route::get('/user/{name}', 'ArticleController@user');

//home
Route::get('/home', 'ArticleController@index')->name('home');

Route::get('/', 'ArticleController@index');
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

//home
Route::get('/home', 'ArticleController@index')->name('home');

Route::get('/', 'ArticleController@index');

// message
Route::group( ['prefix' => 'message', 'middleware' => 'auth'], function() {
    Route::post('{article_id}', 'MessageController@store');

    Route::get('delete/{article_id}/{message_id}', 'MessageController@destroy');
});

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

    Route::get('/user/{name}', 'ArticleController@user');
    
    Route::get('{id}', 'ArticleController@show');
});

//role
Route::group( ['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/index', 'RoleController@index')->middleware(['admin.role:id']);

    Route::get('/role/{id}/upgrade', 'RoleController@roleUpgrade');

    Route::get('/role/{id}/downgrade', 'RoleController@roleDowngrade');
});
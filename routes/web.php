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

Route::post('/message/{article_id}', 'MessageController@store');

Route::get('/message/delete/{article_id}/{message_id}', 'MessageController@destroy');

Route::resource('message', 'MessageController', ['except' => ['index', 'show', 'create', 'store', 'edit']]);

Route::get('/article/{id}', 'ArticleController@show');

Route::resource('article', 'ArticleController', ['except' => ['index', 'show']]);

Route::get('/catagory/{catagory}', 'ArticleController@catagory');

Route::get('/search', 'ArticleController@search');

Route::get('/role', 'RoleController@index');

Route::get('/role/{name}', 'RoleController@create');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
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
Route::resource('article', 'ArticleController', ['except' => ['index', 'show']]);

Route::get('/article/{id}', 'ArticleController@show');

Route::get('/catagory/{catagory}', 'ArticleController@catagory');

Route::get('/search', 'ArticleController@search');

//role
Route::get('/role', 'RoleController@index');

Route::get('/role/{name}', 'RoleController@create');

//user
Route::get('/user/{name}', 'UserController@show');

//home
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
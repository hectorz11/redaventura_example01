<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => '/api/v1'), function() {

	Route::group(array('prefix' => '/users'), function() {

		Route::get('/', array(
			'as' => 'users.index', 'uses' => 'UserController@index'));
		Route::get('/{id}', array(
			'as' => 'users.show', 'uses' => 'UserController@show'));
		Route::post('/', array(
			'as' => 'users.store', 'uses' => 'UserController@store'));
		Route::put('/{id}', array(
			'as' => 'users.update', 'uses' => 'UserController@update'));
		Route::patch('/{id}', array(
			'as' => 'users.path', 'uses' => 'UserController@patch'));
		Route::delete('/{id}', array(
			'as' => 'users.delete', 'uses' => 'UserController@delete'));
	});

	Route::group(array('prefix' => '/posts'), function() {

		Route::get('/', array(
			'as' => 'posts.index', 'uses' => 'PostController@index'));
		Route::get('/{id}', array(
			'as' => 'posts.show', 'uses' => 'PostController@show'));
		Route::post('/', array(
			'as' => 'posts.store', 'uses' => 'PostController@store'));
		Route::put('/{id}', array(
			'as' => 'posts.update', 'uses' => 'PostController@update'));
		Route::patch('/{id}', array(
			'as' => 'posts.path', 'uses' => 'PostController@patch'));
		Route::delete('/{id}', array(
			'as' => 'posts.delete', 'uses' => 'PostController@delete'));
	});
});

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

Route::get('/', function () {
    if (Auth::check())
    {
        $user = Auth::user();
        $data = array(
		    'loginUser'  => $user->name,
		    'isAuth'  => 'true',
		);
        return View::make('index')->with($data);
    }
    else{
        return View::make('index')->with('isAuth', 'false');
    }
});

Route::get('/auth/facebook', 'UserController@loginWithFacebook');
Route::get('/auth/logout', 'UserController@loginOut');

Route::get('/users', 'UserController@showuserall');
Route::get('/user/{id}', 'UserController@showuserone');

Route::get('/file', 'FileController@index');
Route::get('/files', 'FileController@showAll');
Route::get('/file/{id}', 'FileController@show');
Route::get('/file/create', 'FileController@create');
Route::post('/file/create', 'FileController@store');
Route::get('/file/update/{id}', 'FileController@edit');
Route::post('/file/update', 'FileController@update');
Route::post('/file/delete', 'FileController@destroy');

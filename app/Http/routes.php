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

Route::get('/file', 'FileController@index'); # 暫時回傳首頁
Route::get('/files', 'FileController@showAll'); # 顯示所有檔案
Route::get('/file/{id}', 'FileController@show'); # 顯示個別檔案
Route::get('/file/create', 'FileController@create'); # 顯示新增檔案表單
Route::post('/file/create', 'FileController@store'); # 接收新增檔案資料
Route::get('/file/update/{id}', 'FileController@edit'); # 顯示修改檔案表單
Route::post('/file/update', 'FileController@update'); # 接收修改檔案資料
Route::post('/file/delete', 'FileController@destroy'); # 刪除特定檔案

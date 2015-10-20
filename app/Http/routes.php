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
	    return 'The user is logged in...'; 
	}
	else{
		return 'The user is logged out...'; 
	}
	
    
});

Route::get('/auth/facebook', 'UserController@loginWithFacebook');
Route::get('/auth/logout', 'UserController@loginOut');

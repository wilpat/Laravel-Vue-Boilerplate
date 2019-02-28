<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api','prefix' => 'auth'], function () {

    Route::post('register', 'AuthController@register')->name('register');
	Route::post('login', 'AuthController@login')->name('login');
	Route::post('refresh', 'AuthController@refresh')->name('refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'jwt.auth'], function () { // Protect routes with this middleware
	Route::get('user', 'AuthController@user')->name('user'); // get the logged in user
	Route::post('logout', 'AuthController@logout')->name('logout');
});

<?php

use Illuminate\Http\Request;
header('Access-Control-Allow-Origin:*');
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'/home'],function(){
	Route::get('/index','Home\IndexController@home');
	Route::get('/shopID','Home\IndexController@shopID');
	Route::get('/random','Home\IndexController@random');
	Route::post('/regix','Home\IndexController@regix');
	Route::post('/login','Home\IndexController@login');
	Route::post('/showHobbay','Home\IndexController@showHobbay');
	Route::post('/addHobbay','Home\IndexController@addHobbay');
	Route::post('/delHobbay','Home\IndexController@delHobbay');
	Route::post('/showAddress','Home\IndexController@showAddress');
	Route::post('/addAddress','Home\IndexController@addAddress');
	Route::post('/order','Home\IndexController@order');
});
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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/ueditor/fileUpload/{action?}','php\UeditorController@index')->name('fileUpload');

Route::match(['get','post'],'/index','Admin\CategoryController@home');
Route::match(['get','post'],'/text','Admin\CategoryController@text')->name('text');
Route::match(['get','post'],'/show','Admin\CategoryController@textshow')->name('show');
Route::match(['get','post'],'/textdata','Admin\CategoryController@textdata');

Route::group(['prefix'=>'/category'],function(){
    Route::match(['get','post'],'/index','Admin\CategoryController@index')->name('CategoryIndex');
    Route::match(['get','post'],'/add','Admin\CategoryController@add')->name('CategoryAdd');
    Route::match(['get','post'],'/insert','Admin\CategoryController@insert')->name('CategoryInsert');
    Route::match(['get','post'],'/edit/{id}','Admin\CategoryController@edit')->name('CategoryEdit');
    Route::match(['get','post'],'/update','Admin\CategoryController@update')->name('CategoryUpdate');
    Route::match(['get','post'],'/delete/{id}','Admin\CategoryController@delete')->name('CategoryDelete');
});

Route::group(['prefix'=>'/classification'],function(){
    Route::match(['get','post'],'/index','Admin\classificationController@index')->name('ClassificationIndex');
    Route::match(['get','post'],'/add','Admin\classificationController@add')->name('ClassificationAdd');
    Route::match(['get','post'],'/insert','Admin\classificationController@insert')->name('ClassificationInsert');
    Route::match(['get','post'],'/edit/{id}','Admin\classificationController@edit')->name('ClassificationEdit');
    Route::match(['get','post'],'/update','Admin\classificationController@update')->name('ClassificationUpdate');
    Route::match(['get','post'],'/delete/{id}','Admin\classificationController@delete')->name('ClassificationDelete');
});

Route::group(['prefix'=>'/shop'],function(){
    Route::match(['get','post'],'/index','Admin\ShopController@index')->name('ShopIndex');
    Route::match(['get','post'],'/add','Admin\ShopController@add')->name('ShopAdd');
    Route::match(['get','post'],'/insert','Admin\ShopController@insert')->name('ShopInsert');
    Route::match(['get','post'],'/edit/{id}','Admin\ShopController@edit')->name('ShopEdit');
    Route::match(['get','post'],'/update','Admin\ShopController@update')->name('ShopUpdate');
    Route::match(['get','post'],'/delete/{id}','Admin\ShopController@delete')->name('ShopDelete');
});
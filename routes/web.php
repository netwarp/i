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

Route::get('/', 'FrontController@getIndex');

Route::get('login', ['as' => 'login', 'uses' => 'FrontController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'FrontController@postLogin']);

Route::get('logout', 'FrontController@logout');

Route::get('file/{path}', 'FrontController@file');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', ['as' => 'getIndex', 'uses' => 'AdminController@getIndex']);

    Route::resources([
        'photos' => 'PhotosController',
        'videos' => 'VideosController'
    ]);

    Route::get('setting', ['as' => 'setting.index', 'uses' => 'SettingController@getIndex']);
    Route::post('setting', ['as' => 'setting.post', 'uses' => 'SettingController@postIndex']);
});


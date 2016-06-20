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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/quest/basic', 'HomeController@getQuestBasic');
Route::get('/quest/iterator', 'HomeController@getQuestIterator');

Route::group(['prefix' => 'picture'], function() {
    Route::group(['middleware' => ['role:admin']], function() {
        Route::get('/new', 'PictureController@getNewPicture');
        Route::post('/', 'PictureController@postPicture');
        Route::post('/{id}', 'PictureController@putPicture');
        Route::delete('/{id}', 'PictureController@deletePicture');
    });

    Route::get('/', 'PictureController@getAll');
    Route::get('/{id}', 'PictureController@getPicture');
});
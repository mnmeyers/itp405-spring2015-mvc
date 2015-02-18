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

Route::get('/', 'WelcomeController@index');

Route::get('/songs/search', 'SongControllers@search'); //url segment with some kind of controller and method
Route::get('/songs', 'SongControllers@results');
Route::get('/dvds/search', 'DvdController@search');//is @search the name of the method or the file??
Route::get('/dvds', 'DvdController@results');//is @results the name of the method or the file??
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
Route::get('/dvds/search', 'DvdController@search');
////the below route may cause a conflict
Route::get('/dvds', 'DvdController@results');
//you can use the same url multiple times as long as it's different verbs

//why do these two conflict with the next two??
Route::get('/dvds/{id}', 'DvdController@reviews');
Route::post('/dvds/submit', 'DvdController@storeReview');

//start mar 3 hw
Route::get('/dvds/create' , 'DvdControllers@createDvd');
Route::post('/dvds', 'DvdControllers@storeDvd');

Route::get('/genres/{name}/dvds', 'DvdControllers@displayGenres');

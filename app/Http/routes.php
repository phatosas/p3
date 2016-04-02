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

Route::group(['middleware' => ['web']], function () {
	Route::get('/lorem-ipsum', 'P3Controller@getIndexLoremIpsum');
	Route::get('/user-generator', 'P3Controller@getIndexUserGenerator');
	Route::get('/xkcd-generator', 'P3Controller@getIndexXkcdGenerator');
	Route::post('/lorem-ipsum', 'P3Controller@postIndexLoremIpsum');
	Route::post('/user-generator', 'P3Controller@postIndexUserGenerator');
	Route::post('/xkcd-generator', 'P3Controller@postIndexXkcdGenerator');
    Route::post('/', function () { return view('welcome');
    });
});



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

Route::get('/test', 'TestController@test');

Route::any('/todos', 'StatesController@index');
Route::any('/ajax', 'StatesController@ajax');
Route::any('/ajax_practice', 'AjaxController@index');
Route::any('/ajax_practice/ajax', 'AjaxController@ajax');



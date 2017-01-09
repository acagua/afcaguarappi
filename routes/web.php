<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('punto1', 
  ['as' => 'punto1', 'uses' => 'punto1Controller@index']);

Route::post('punto1', 
  ['as' => 'punto1_process', 'uses' => 'punto1Controller@process']);

Route::get('punto1/respuestas', function () {
    return view('pages.respuestas1');
});

Route::get('punto2', function () {
    return view('pages.punto2');
});
Route::get('punto3', function () {
    return view('pages.punto3');
});
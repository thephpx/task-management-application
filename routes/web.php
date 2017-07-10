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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@test');


// login and registration
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

// routes for functionality
Route::get('/crews', 'CrewsController@index')->name('crews');
Route::post('/crews', 'CrewsController@store');
Route::get('/crews/{crew}', 'CrewsController@show');

Route::get('/tasks/destroy/{task}', 'TasksController@destroy');
Route::post('/tasks/store/{crew}', 'TasksController@store');

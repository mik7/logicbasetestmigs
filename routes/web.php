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
    return view('prof');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profiles', 'ProfileController');

Route::get('/', 'ProfileController@show')->name('display');



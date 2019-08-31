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
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Create', 'ProfileController@create')->name('create');

Route::post('/', 'ProfileController@store')->name('saveprofile');

Route::get('/', 'ProfileController@show')->name('display');

Route::get('/Edit/{id?}', 'ProfileController@edit')->name('edit');

Route::get('/Delete', 'ProfileController@destroy')->name('destroy');


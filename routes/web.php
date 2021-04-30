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

Route::get('/', 'PageController@services');
Route::get('services-list/{service}', 'PageController@services')->name('service');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('services', 'Backend\ServiceController')
    ->middleware('auth')
    ->except('show');

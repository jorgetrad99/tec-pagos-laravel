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

Route::get('/lista-servicios', 'PageController@services');
/* Route::get('/services-list/{service}', 'PageController@services')->name('service'); */

/* Route::get('/users', 'Backend\UserController@index');
Route::post('users', 'Backend\UserController@store')->name('users.store');   //Salvar en la base de datos
Route::delete('users/{user}', 'Backend\UserController@destroy')->name('users.destroy');   //Eliminar de la base de datos
 */
Route::resource('users', 'Backend\UserController')
    ->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('services', 'Backend\ServiceController')
    ->middleware('auth');

Route::resource('histories', 'Backend\HistoryController')
    ->middleware('auth');

Route::resource('cards', 'Backend\CardController')
    ->middleware('auth');


Route::get('history', 'Backend\HistoryController@index_alumno')->name('histories.index_alumno');
Route::get('card-data', 'Backend\CardController@card_data')->name('cards.card_data');

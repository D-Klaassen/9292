<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContentController@index')->name('testApi');
//Route::post('/', 'ContentController@index')->name('postApi');


Route::post('/station', 'DepartureAndArrivalController@index')->name('DeparturesAndArrivals');

Route::get('/station', 'DepartureAndArrivalController@getError')->name('DeparturesAndArrivals');


Route::post('/routePlanner', 'DepartureAndArrivalController@planRoute')->name('planRoute');



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','ManufactureController@showManufactureScreen');
Route::get('/manufatcure/list','ManufactureController@showManufactureList');
Route::post('/add/manufacture','ManufactureController@addManufacture');
Route::get('/get/manufacture/list','ManufactureController@manufactureList');
Route::get('/show/modal/form','ManufactureController@showModalScreen')->name('add-modal');
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

Route::get('/','App\Http\Controllers\MasterController@index');
Route::post('/add-product', 'App\Http\Controllers\MasterController@addProduct');
Route::get('/getProductById/{id}', 'App\Http\Controllers\MasterController@getProductDataById');
Route::post('/edit-product', 'App\Http\Controllers\MasterController@editProduct');



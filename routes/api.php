<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// basket/cart routes
Route::post('/basket/store', 'API\BasketController@store')->name('api.basket.store');
Route::post('/basket/update', 'API\BasketController@update')->name('api.basket.update');
Route::post('/basket/delete', 'API\BasketController@delete')->name('api.basket.delete');
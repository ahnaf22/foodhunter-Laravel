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

Route::get('/', 'PageController@homePage' )->name('homePage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// User Routes
Route::get('/token/{token}', 'VerificationController@verify' )->name('user.verification');


//admin and user dashboard routes
Route::get('/admin', 'AdminController@index')->name('admin.index');


//admin category routes
Route::get('/admin/categories', 'CategoryController@index')->name('admin.categories');
Route::get('/admin/category/create', 'CategoryController@create')->name('admin.category.create');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
Route::post('/admin/category/create', 'CategoryController@store')->name('admin.category.store');
Route::post('/admin/category/edit/{id}', 'CategoryController@update')->name('admin.category.update');
Route::post('/admin/category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');

// admin users routes
Route::get('/admin/users/index', 'AdminController@allusers')->name('admin.users.index');
Route::get('/admin/sellers/index', 'AdminController@allsellers')->name('admin.sellers.index');
Route::get('/admin/sellers/requests', 'AdminController@sellerRequests')->name('admin.sellers.requests');


// seller registration route
Route::get('/seller/registration', 'PageController@sellerRegistration')->name('seller.registration');
Route::post('/seller/registration/register', 'UserController@registerSeller')->name('seller.registration.register');


// Food Routes
Route::get('/foodDetails', 'FoodController@foodDetails')->name('food.details');
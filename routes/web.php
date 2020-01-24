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
Auth::routes();

// page routes
Route::get('/', 'PageController@homePage' )->name('homePage');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/foodsharingmode', 'PageController@learnfoodsharingmode')->name('foodsharing.learn');





// User Routes
Route::get('/token/{token}', 'VerificationController@verify' )->name('user.verification');
Route::get('/user/profile', 'UserController@userProfile' )->name('user.profile');



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
Route::get('/admin/sellers/accept/{id}', 'AdminController@approveseller')->name('admin.seller.accept');
Route::post('/admin/sellers/reject/{id}', 'AdminController@rejectseller')->name('admin.seller.reject');


//admin food routes
Route::get('/admin/food/create', 'FoodController@food_create')->name('admin.food.create');
Route::get('/admin/food/edit/{id}', 'FoodController@food_edit')->name('admin.food.edit');
Route::post('/admin/food/create', 'FoodController@food_store')->name('admin.food.store');
Route::post('/admin/food/edit/{id}', 'FoodController@food_update')->name('admin.food.update');
Route::post('/admin/food/delete/{id}', 'FoodController@food_delete')->name('admin.food.delete');
Route::get('/admin/food', 'FoodController@allfoods')->name('admin.food');

// seller shop routes
Route::get('/admin/shop/profile', 'ShopController@seller_shopProfile')->name('admin.shop.profile');
Route::get('/admin/shop/orders', 'ShopController@seller_shopOrders')->name('admin.shop.orders');
Route::post('/admin/shop/order/view', 'ShopController@seller_orderView')->name('admin.shop.order.view');
Route::post('/admin/shop/order/confirm', 'ShopController@seller_orderConfirm')->name('admin.shop.order.confirm');
Route::post('/admin/shop/order/complete', 'ShopController@seller_orderComplete')->name('admin.shop.order.complete');



// user order management routes
Route::get('/user/userorders', 'OrderController@user_orders')->name('user.orders');
Route::post('/order/delete', 'OrderController@delete_orders')->name('order.delete');
Route::post('/order/view', 'OrderController@view_order')->name('order.view');


// seller registration route
Route::get('/seller/registration', 'PageController@sellerRegistration')->name('seller.registration');
Route::post('/seller/registration/register', 'UserController@registerSeller')->name('seller.registration.register');






// frontend Food Routes
Route::get('/foodDetails/{id}', 'FoodController@foodDetails')->name('food.details');
Route::get('/homemade', 'FoodController@allHomemade')->name('food.homemade');


// front end shop routes
Route::get('/shops', 'ShopController@allShops')->name('shops');
Route::get('/shops/details/{id}', 'ShopController@shopDetails')->name('shops.details');



// basket/cart routes
Route::get('/basket', 'BasketController@index')->name('basket');
Route::post('/basket/store', 'BasketController@store')->name('basket.store');
Route::post('/basket/update', 'BasketController@update')->name('basket.update');
Route::post('/basket/delete', 'BasketController@delete')->name('basket.delete');


// checkout routes
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout/store', 'CheckoutController@store')->name('checkout.store');


// search routes
Route::get('/search/shops', 'SearchController@searchShops')->name('search.shops');
Route::get('/search/foods', 'SearchController@searchFoods')->name('search.foods');


// categorywise food show
Route::get('/foods/category/{id}', 'PageController@foodsofcategory')->name('foods.category');


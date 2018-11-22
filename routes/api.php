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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'OwnerController@login');
    Route::get('user', 'OwnerController@user');
  	Route::get('logout', 'OwnerController@logout');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/owners','OwnerController');

Route::apiResource('/foodTrucks','FoodTruckController');

Route::apiResource('/provider-categories','ProviderCategoryController');
Route::match(['get','post'], '/get-categories-by-truckid', 'ProviderCategoryController@getCategoriesByTruckId');
Route::match(['get','post'], '/get-all-provider-categories', 'ProviderCategoryController@getAllProviderCategories');

Route::apiResource('/products','ProductController');
Route::match(['get','post'], '/get-products-by-truckid', 'ProductController@getProductsByTruckId');
Route::match(['get','post'], '/get-veg-products', 'ProductController@getVegProducts');
Route::match(['get','post'], '/get-products-by-catid', 'ProductController@getProductsByCatId');
Route::match(['get','post'], '/search-by-name', 'ProductController@searchByName');

Route::apiResource('/banners','BannerController');
Route::match(['get','post'], '/get-banners-by-truckid', 'BannerController@getBannersByTruckID');

Route::apiResource('/sponsers','SponserController');

Route::apiResource('/categories','CategoryController');

Route::apiResource('/combos','ComboController');

Route::apiResource('/dboys','DeliveryBoyController');

Route::apiResource('/orders','OrderController');
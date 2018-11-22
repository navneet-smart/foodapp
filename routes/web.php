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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get','post'], '/admin', 'AdminController@login');
Route::match(['get','post'], '/logout', 'AdminController@logout');

Route::group(['middleware'=>['auth']], function(){
	// Admin
	Route::get('/admin/dashboard', 'AdminController@dashboard');
	Route::get('/admin/settings', 'AdminController@settings');
	Route::get('/admin/check-pwd', 'AdminController@checkPassword');
	Route::match(['get','post'], '/admin/update-pwd', 'AdminController@updatePassword');
	Route::get('/admin/profile', 'AdminController@profile');
	Route::match(['get','post'], '/admin/edit-profile/{id}', 'AdminController@editProfile');

	// Owners
	Route::get('/admin/view-owners', 'OwnerController@viewOwners');
	// Route::get('/admin/delete-owner/{id}', 'OwnerController@deleteOwner');
	Route::match(['get','post'], '/admin/add-owner', 'OwnerController@addOwner');
	Route::match(['get','post'], '/admin/edit-owner/{id}', 'OwnerController@editOwner');
	Route::get('/admin/check-email', 'OwnerController@checkEmail');

	// Food Trucks
	Route::get('/admin/view-foodTrucks', 'FoodTruckController@viewfoodTrucks');
	Route::get('/admin/delete-foodTruck/{id}', 'FoodTruckController@deletefoodTruck');
	// Route::match(['get','post'], '/admin/add-foodTruck', 'FoodTruckController@addfoodTruck');
	Route::match(['get','post'], '/admin/edit-foodTruck/{id}', 'FoodTruckController@editfoodTruck');

	// Categories
	Route::get('/admin/view-categories', 'CategoryController@viewCategories');
	Route::get('/admin/delete-category/{id}', 'CategoryController@deleteCategory');
	Route::match(['get','post'], '/admin/add-category', 'CategoryController@addCategory');
	Route::match(['get','post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
	Route::get('/admin/check-category', 'CategoryController@checkCategory');
	Route::get('/admin/delete-category-image/{id}', 'CategoryController@deleteCategoryImage');

	// Provider Categories
	// Route::get('/admin/view-provider-categories', 'ProviderCategoryController@viewProviderCategories');
	Route::get('/admin/delete-provider-category/{id}', 'ProviderCategoryController@deleteProviderCategory');
	// Route::match(['get','post'], '/admin/add-provider-category', 'ProviderCategoryController@addProviderCategory');
	Route::match(['get','post'], '/admin/edit-provider-category/{id}', 'ProviderCategoryController@editProviderCategory');

	// Sponsers
	Route::get('/admin/view-sponsers', 'SponserController@viewSponsers');
	Route::get('/admin/delete-sponser/{id}', 'SponserController@deleteSponser');
	Route::match(['get','post'], '/admin/add-sponser', 'SponserController@addSponser');
	Route::match(['get','post'], '/admin/edit-sponser/{id}', 'SponserController@editSponser');
	Route::get('/admin/check-sponser', 'SponserController@checkSponser');
	Route::get('/admin/delete-sponser-image/{id}', 'SponserController@deleteSponserImage');

	// Banners
	// Route::get('/admin/view-banners', 'BannerController@viewBanners');
	// Route::get('/admin/delete-banner/{id}', 'BannerController@deleteBanner');
	// Route::match(['get','post'], '/admin/add-banner', 'BannerController@addBanner');
	// Route::match(['get','post'], '/admin/edit-banner/{id}', 'BannerController@editBanner');

	// Products
	// Route::get('/admin/view-products', 'ProductController@viewProducts');
	Route::get('/admin/delete-product/{id}', 'ProductController@deleteProduct');
	// Route::match(['get','post'], '/admin/add-product', 'ProductController@addProduct');
	Route::match(['get','post'], '/admin/edit-product/{id}', 'ProductController@editProduct');

	// Orders
	Route::get('/admin/view-orders', 'OrderController@viewOrders');
	// Route::get('/admin/delete-order/{id}', 'ProductController@deleteProduct');
	// Route::match(['get','post'], '/admin/add-order', 'ProductController@addProduct');
	// Route::match(['get','post'], '/admin/edit-order/{id}', 'ProductController@editProduct');

	// Firebase
	// Route::get('firebase','FirebaseController@index');
	// Route::get('get-data','FirebaseController@show');
	// Route::get('get-real','FirebaseController@real');

	// Delivery Boys
	Route::get('/admin/view-deliveryBoys', 'DeliveryBoyController@viewdeliveryBoys');
	// Route::get('/admin/delete-owner/{id}', 'OwnerController@deleteOwner');
	Route::match(['get','post'], '/admin/add-deliveryBoy', 'DeliveryBoyController@adddeliveryBoy');
	Route::match(['get','post'], '/admin/edit-deliveryBoy/{id}', 'DeliveryBoyController@editdeliveryBoy');
});
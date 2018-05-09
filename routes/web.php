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

//Route::get('/', function () {
//    return view('welcome');
//});

//Kute Bari Template
Route::get('/','ClientController@index');
Route::get('client-login','ClientController@client_login');
//Route::get('order','ClientController@order');
Route::get('category/{id}','ClientController@category');
Route::get('product-details/{id}','ClientController@product_details');
Route::get('wishlist','ClientController@wishlist');
Route::get('compare','ClientController@compare');

//Admin Template
Route::get('admin-login','AdminController@index');
Route::post('admin-login-check','AdminController@admin_login_check');

//Start Super Admin
Route::get('dashboard','SuperAdminController@index');
Route::get('add-category','SuperAdminController@add_category');
Route::post('save-category','SuperAdminController@save_category');
Route::get('manage-category','SuperAdminController@manage_category');
Route::get('unpublished-category/{id}','SuperAdminController@unpublished_category');
Route::get('published-category/{id}','SuperAdminController@published_category');
Route::get('edit-category/{id}','SuperAdminController@edit_category');
Route::post('update-category/','SuperAdminController@update_category');
Route::get('undo-category/{id}','SuperAdminController@undo_category');
Route::get('delete-category/{id}','SuperAdminController@delete_category');
Route::get('remove-featured-category/{id}','SuperAdminController@remove_featured_category');
Route::get('add-featured-category/{id}','SuperAdminController@add_featured_category');
Route::get('add-manufacturer','SuperAdminController@add_manufacturer');
Route::post('save-manufacturer','SuperAdminController@save_manufacturer');
Route::get('manage-manufacturer','SuperAdminController@manage_manufacturer');
Route::get('unpublished-manufacturer/{id}','SuperAdminController@unpublished_manufacturer');
Route::get('published-manufacturer/{id}','SuperAdminController@published_manufacturer');
Route::get('undo-manufacturer/{id}','SuperAdminController@undo_manufacturer');
Route::get('delete-manufacturer/{id}','SuperAdminController@delete_manufacturer');
Route::get('add-product','SuperAdminController@add_product');
Route::post('save-product-info','SuperAdminController@save_product_info');
Route::get('manage-product','SuperAdminController@manage_product');
Route::get('unpublished-product/{id}','SuperAdminController@unpublished_product');
Route::get('published-product/{id}','SuperAdminController@published_product');
Route::get('undo-product/{id}','SuperAdminController@undo_product');
Route::get('delete-product/{id}','SuperAdminController@delete_product');
Route::get('remove-featured-product/{id}','SuperAdminController@remove_featured_product');
Route::get('add-featured-product/{id}','SuperAdminController@add_featured_product');
Route::get('logout','SuperAdminController@logout');

//Start Cart
Route::match(['get','post'],'add-to-cart/{id}','CartController@add_to_cart');
Route::get('order','CartController@order');
Route::post('update-cart','CartController@update_cart');
Route::get('delete-from-cart/{rowId}','CartController@delete_from_cart');

//Start Check Out
Route::get('checkout','CheckOutController@checkout');
Route::get('ajax-email-check-customer/{id}','CheckOutController@ajax_email_check_customer');
Route::post('save-customer','CheckOutController@save_customer');
Route::get('shipping','CheckOutController@shipping');
Route::get('ajax-email-check-shipping/{id}','CheckOutController@ajax_email_check_shipping');
Route::post('save-shipping','CheckOutController@save_shipping');
Route::get('confirm-order','CheckOutController@confirm_order');
Route::post('place-order','CheckOutController@place_order');
Route::get('successfull-order','CheckOutController@successfull_order');

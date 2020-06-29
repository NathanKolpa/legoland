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

// Website Routes
Route::get('/', "HomeController@index");
Route::get('/login', "LoginController@loginPage");
Route::get('/register', "LoginController@registerPage");
Route::get('/orders/create', "OrderController@createOrderPage");
Route::get('/self/settings', "SettingsController@settingsPage");
Route::get('/contact', "HomeController@contactPage");


Route::post('/login', "LoginController@loginAction");
Route::get('/logout', "LoginController@logoutAction");
Route::post('/users', "LoginController@registerAction");
Route::post('/orders', "OrderController@addOrderAction");
Route::post('/cart/items', "OrderController@addToCartAction");
Route::delete('/cart/items', "OrderController@clearCartAction");
Route::put('/self', "SettingsController@updateUserAction");
Route::delete('/admin/users/{user}', "AdminUsersController@deleteUser");
Route::put('/admin/users/{user}', "AdminUsersController@updateUser");
Route::delete('/admin/orders/{order}', "AdminOrdersController@deleteOrder");
Route::put('/admin/orders/{order}/items/{ticket}', "AdminOrdersController@updateOrderItem");
Route::delete('/admin/orders/{order}/items/{ticket}', "AdminOrdersController@deleteOrderItem");

// Admin Routes
Route::get('/admin', "AdminHomeController@index");
Route::get('/admin/orders', "AdminOrdersController@manageOrderPage");
Route::get('/admin/users', "AdminUsersController@manageUsersPage");


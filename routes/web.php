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

Route::post('/login', "LoginController@loginAction");
Route::get('/logout', "LoginController@logoutAction");
Route::post('/users', "LoginController@registerAction");
Route::post('/orders', "OrderController@addOrderAction");
Route::post('/cart/items', "OrderController@addToCartAction");
Route::delete('/cart/items', "OrderController@clearCartAction");

// Admin Routes
Route::get('/admin', "AdminHomeController@index");
//Route::get('/admin/orders', "OrderController@manageOrderPage");

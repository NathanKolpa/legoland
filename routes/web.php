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

// Admin Routes
Route::get('/admin', "AdminHomeController@index");

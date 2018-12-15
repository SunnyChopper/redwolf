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

// Public site
Route::get('/', 'PagesController@index');

// Admin site
Route::get('/admin', 'AdminController@login');
Route::post('/admin/login', 'AdminController@user_login');

Auth::routes();

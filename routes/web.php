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

// Debugging
Route::get('/test', 'PagesController@test');

// Public site
Route::get('/', 'PagesController@index');
Route::get('/invoices/{invoice_id}', 'PagesController@show_invoice');
Route::get('/mission', 'PagesController@mission');
Route::get('/services', 'PagesController@services');
Route::get('/thank-you', 'PagesController@thank_you');

// Admin site
Route::get('/admin', 'AdminController@login');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/clients/view', 'AdminController@view_clients');
Route::get('/admin/clients/edit/{client_id}', 'AdminController@edit_client');
Route::get('/admin/clients/new', 'AdminController@new_client');
Route::get('/admin/invoices/view', 'AdminController@view_invoices');
Route::get('/admin/invoices/edit/{invoice_id}', 'AdminController@edit_invoice');
Route::get('/admin/invoices/new', 'AdminController@new_invoice');

// Client functions
Route::post('/admin/clients/create', 'ClientsController@create');
Route::post('/admin/clients/update', 'ClientsController@update');
Route::post('/admin/clients/delete', 'ClientsController@delete');

// Invoice functions
Route::post('/admin/invoices/create', 'InvoicesController@create');
Route::post('/admin/invoices/update', 'InvoicesController@update');
Route::post('/admin/invoices/delete', 'InvoicesController@delete');
Route::post('/invoices/pay', 'InvoicesController@make_payment');

// User control
Route::post('/admin/login', 'AdminController@user_login');

Auth::routes();

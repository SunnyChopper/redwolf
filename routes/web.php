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

// Client websites
Route::get('/dev/divinebliss', function(){
	return redirect('http://ec2-18-218-40-196.us-east-2.compute.amazonaws.com');
});
Route::get('/dev/drsonja', function() {
	return redirect('http://ec2-18-223-44-79.us-east-2.compute.amazonaws.com');
});
Route::get('/dev/mehrassoc', function() {
	return redirect('http://ec2-3-17-11-45.us-east-2.compute.amazonaws.com');
});

// Public site
Route::get('/', 'PagesController@index');
Route::get('/invoices/{invoice_id}', 'PagesController@show_invoice');
Route::get('/mission', 'PagesController@mission');
Route::get('/services', 'PagesController@services');
Route::get('/portfolio', 'PagesController@portfolio');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact/submit', 'PagesController@submit_contact');
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

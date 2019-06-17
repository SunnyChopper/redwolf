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
	return redirect('http://ec2-3-17-193-30.us-east-2.compute.amazonaws.com');
});
Route::get('/dev/drsonja', function() {
	return redirect('http://ec2-18-223-44-79.us-east-2.compute.amazonaws.com');
});
Route::get('/dev/mehrassoc', function() {
	return redirect('http://ec2-3-17-11-45.us-east-2.compute.amazonaws.com');
});
Route::get('/dev/gromd', function() {
	return redirect('http://ec2-18-216-104-36.us-east-2.compute.amazonaws.com');
});
Route::get('/dev/steve', function() {
	return redirect('http://ec2-18-234-73-162.compute-1.amazonaws.com');
});
Route::get('/dev/astro', function() {
	return redirect('http://ec2-18-224-184-97.us-east-2.compute.amazonaws.com');
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
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/settings', 'AdminController@settings');

// Admin client functions
Route::get('/admin/clients/view', 'AdminController@view_clients');
Route::get('/admin/clients/edit/{client_id}', 'AdminController@edit_client');
Route::get('/admin/clients/new', 'AdminController@new_client');

// Admin invoice functions
Route::get('/admin/invoices/view', 'AdminController@view_invoices');
Route::get('/admin/invoices/edit/{invoice_id}', 'AdminController@edit_invoice');
Route::get('/admin/invoices/new', 'AdminController@new_invoice');

// Admin employee functions
Route::get('/admin/employees/view', 'EmployeesController@view_all');
Route::get('/admin/employees/new', 'EmployeesController@new');
Route::post('/admin/employees/create', 'EmployeesController@create');
Route::get('/admin/employees/edit/{employee_id}', 'EmployeesController@edit');
Route::post('/admin/employees/update', 'EmployeesController@update');
Route::post('/admin/employees/delete', 'EmployeesController@delete');

// Admin employee categories
Route::get('/admin/employee-categories/new', 'EmployeesCategoryController@new');
Route::post('/admin/employee-categories/create', 'EmployeesCategoryController@create');
Route::get('/admin/employee-categories/view', 'EmployeesCategoryController@view_all');
Route::get('/admin/employee-categories/edit/{category_id}', 'EmployeesCategoryController@edit');
Route::post('/admin/employee-categories/update', 'EmployeesCategoryController@update');

// Admin tasks categories
Route::get('/admin/tasks/view', 'AdminController@view_all_tasks');
Route::get('/admin/tasks/requested', 'AdminController@view_requested_tasks');
Route::get('/admin/tasks/{task_id}/edit', 'AdminController@edit_task');
Route::post('/admin/tasks/update', 'AdminController@update_task');
Route::get('/admin/tasks/new', 'AdminController@new_task');
Route::post('/admin/tasks/create', 'AdminController@create_task');

// Employee site
Route::get('/employee', 'EmployeesController@login');
Route::post('/employees/login/attempt', 'EmployeesController@attempt_login');
Route::get('/employee/password/set', 'EmployeesController@set_password');
Route::post('/employees/password/update', 'EmployeesController@update_password');
Route::get('/employee/dashboard', 'EmployeesController@dashboard');
Route::get('/employee/logout', 'EmployeesController@logout');

// Client functions
Route::post('/admin/clients/create', 'ClientsController@create');
Route::post('/admin/clients/update', 'ClientsController@update');
Route::post('/admin/clients/delete', 'ClientsController@delete');

// Invoice functions
Route::post('/admin/invoices/create', 'InvoicesController@create');
Route::post('/admin/invoices/update', 'InvoicesController@update');
Route::post('/admin/invoices/delete', 'InvoicesController@delete');
Route::post('/invoices/pay', 'InvoicesController@make_payment');

// Client dashboard functions
Route::get('/clients/login', 'ClientsController@dashboard_login');
Route::post('/clients/login/attempt', 'ClientsController@attempt_login');
Route::get('/clients/dashboard', 'ClientsController@dashboard');
Route::get('/clients/dashboard/tasks', 'ClientsController@dashboard_view_tasks');
Route::get('/clients/dashboard/tasks/request', 'ClientsController@dashboard_request_task');
Route::post('/clients/dashboard/tasks/request/submit', 'ClientsController@dashboard_submit_request');
Route::get('/clients/dashboard/invoices', 'ClientsController@dashboard_view_invoices');
Route::get('/clients/dashboard/logs', 'ClientsController@dashboard_view_logs');
Route::get('/clients/logout', 'ClientsController@client_logout');


// User control
Route::post('/admin/login', 'AdminController@user_login');

Auth::routes();

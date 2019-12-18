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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/customer/invoices', 'InvoiceController@index')->name('customer.invoices');
//Route::get('/customer/invoices/show', 'InvoiceController@show')->name('customer.invoices.show');
Route::get('/admin', 'HomeController@admin')->middleware('admin');
Route::resource('admin/users', 'Admin\UserController')->middleware('admin');
Route::resource('admin/companies', 'Admin\CompanyController')->middleware('admin');
Route::resource('admin/invoices', 'Admin\InvoiceController')->middleware('admin');
Route::resource('customer/invoices', 'InvoiceController', [
    'as' => 'customer'
]);

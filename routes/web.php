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
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
//Route::get('admin/companies', 'CompanyController@admin')->middleware('admin');
Route::resource('admin/companies', 'CompanyController')->middleware('admin');
Route::resource('admin/users', 'UserController');
Route::resource('admin/invoices', 'InvoiceController');

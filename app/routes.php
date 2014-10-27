<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::resource('roles', 'RolesController');
Route::resource('employees', 'EmployeesController');
Route::resource('categories', 'CategoriesController');
Route::resource('shippers', 'ShippersController');
Route::resource('brands', 'BrandsController');
Route::resource('products', 'ProductsController');
Route::get('/', function()
{
	return View::make('hello');
});



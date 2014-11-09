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
Route::group(array('before'=>'auth.employee'), function() { 
  Route::resource('roles', 'RolesController');
  Route::resource('employees', 'EmployeesController');
  Route::resource('categories', 'CategoriesController');
  Route::resource('shippers', 'ShippersController');
  Route::resource('brands', 'BrandsController');
  Route::resource('products', 'ProductsController');
  Route::resource('customers', 'CustomersController');
  Route::resource('taxes', 'TaxesController');
  Route::get('logout', 'SessionsController@destroy');
  Route::post('/roles/search','RolesController@search');

});

Route::get('/', 'SessionsController@create');
Route::get('login', 'SessionsController@create');
Route::resource('sessions','SessionsController');



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
Route::get('customers/create', array('as' => 'customers.create', 'uses' => 'CustomersController@create'));
Route::post('customers', array('as' => 'customers.store', 'uses' => 'CustomersController@store'));

Route::group(array('before'=>'auth.employee'), function() { 
  Route::resource('roles', 'RolesController');
  Route::resource('employees', 'EmployeesController');
  Route::resource('categories', 'CategoriesController');
  Route::resource('shippers', 'ShippersController');
  Route::resource('brands', 'BrandsController');
  Route::resource('products', 'ProductsController');
  Route::resource('discounts', 'DiscountsController');
  Route::get('customers', array('as' => 'customers.index', 'uses' => 'CustomersController@index'));
  Route::get('customers/{customers}', array('as' => 'customers.show', 'uses' => 'CustomersController@show'));
  Route::get('customers/{customers}/edit', array('as' => 'customers.edit', 'uses' => 'CustomersController@edit'));
  Route::put('customers/{customers}', array('as' => 'customers.update', 'uses' => 'CustomersController@update'));
  Route::patch('customers/{customers}', array('as' => 'customers.update', 'uses' => 'CustomersController@update'));
  Route::delete('customers/{customers}', array('as' => 'customers.destroy', 'uses' => 'CustomersController@destroy'));
  Route::resource('taxes', 'TaxesController');
  Route::get('logout', 'SessionsController@destroy');
  Route::post('/roles/search','RolesController@search');
  Route::post('/brands/search','BrandsController@search');
  Route::post('/categories/search','CategoriesController@search');
  Route::post('/customers/search','CustomersController@search'); 
  Route::post('/employees/search','EmployeesController@search');
  Route::post('/shippers/search','ShippersController@search');
  Route::post('/products/search','ProductsController@search');
  
  
});

Route::group(array('before'=>'auth.customer'), function() { 
  Route::get('signout', 'CustomersSessionsController@destroy');
  Route::get('index', array('as' => 'home.index', 'uses' => 'HomeController@index'));
});

Route::get('login', 'SessionsController@create');

Route::get('/', 'CustomersSessionsController@create');
Route::get('/signin', 'CustomersSessionsController@create');
Route::get('signup', 'CustomersSessionsController@signup');


Route::resource('sessions','SessionsController');
Route::resource('customers_sessions','CustomersSessionsController');




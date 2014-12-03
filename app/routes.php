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

Route::group(array('before'=>'super'), function() { 
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
  Route::get('/trending/products',array('as' => 'products.trending', 'uses' => 'ProductsController@trending'));
  Route::get('orders', array('as' => 'orders.index', 'uses' => 'QueriesController@orders_index'));
  Route::get('orders/{orders}', array('as' => 'orders.show', 'uses' => 'QueriesController@orders_show'));
  Route::get('sales', array('as' => 'sales.index', 'uses' => 'QueriesController@sales_index'));
  Route::get('pro_cat', array('as' => 'pro_cat.index', 'uses' => 'QueriesController@pro_cat_index'));
  Route::post('/orders/search','QueriesController@orders_search');
  Route::post('/sales/search','QueriesController@sales_search');
  Route::post('/pro_cat/search','QueriesController@pro_cat_search');
});

Route::group(array('before'=>'read-only'), function() { 
  Route::get('products', array('as' => 'products.index', 'uses' => 'ProductsController@index'));
  Route::get('products/{products}', array('as' => 'products.show', 'uses' => 'ProductsController@show'));
  
  Route::get('discounts', array('as' => 'discounts.index', 'uses' => 'DiscountsController@index'));
  Route::get('discounts/{discounts}', array('as' => 'discounts.show', 'uses' => 'DiscountsController@show'));  
  
  Route::get('customers', array('as' => 'customers.index', 'uses' => 'CustomersController@index'));
  Route::get('customers/{customers}', array('as' => 'customers.show', 'uses' => 'CustomersController@show'));
  
  Route::get('brands', array('as' => 'brands.index', 'uses' => 'BrandsController@index'));
  Route::get('brands/{brands}', array('as' => 'brands.show', 'uses' => 'BrandsController@show'));  
  
  Route::get('shippers', array('as' => 'shippers.index', 'uses' => 'ShippersController@index'));
  Route::get('shippers/{shippers}', array('as' => 'shippers.show', 'uses' => 'ShippersController@show'));  
  
  Route::get('categories', array('as' => 'categories.index', 'uses' => 'CategoriesController@index'));
  Route::get('categories/{categories}', array('as' => 'categories.show', 'uses' => 'CategoriesController@show'));
  
  Route::get('employees', array('as' => 'employees.index', 'uses' => 'EmployeesController@index'));
  Route::get('employees/{employees}', array('as' => 'employees.show', 'uses' => 'EmployeesController@show'));
  
  Route::get('roles', array('as' => 'roles.index', 'uses' => 'RolesController@index'));
  Route::get('roles/{roles}', array('as' => 'roles.show', 'uses' => 'RolesController@show'));
  
  Route::get('taxes', array('as' => 'taxes.index', 'uses' => 'TaxesController@show'));
  Route::get('taxes/{taxes}', array('as' => 'taxes.show', 'uses' => 'TaxesController@show'));
  
  Route::get('logout', 'SessionsController@destroy');
  Route::post('/roles/search','RolesController@search');
  Route::post('/brands/search','BrandsController@search');
  Route::post('/categories/search','CategoriesController@search');
  Route::post('/customers/search','CustomersController@search'); 
  Route::post('/employees/search','EmployeesController@search');
  Route::post('/shippers/search','ShippersController@search');
  Route::post('/products/search','ProductsController@search');

  Route::get('orders', array('as' => 'orders.index', 'uses' => 'QueriesController@orders_index'));
  Route::get('orders/{orders}', array('as' => 'orders.show', 'uses' => 'QueriesController@orders_show'));
  Route::get('sales', array('as' => 'sales.index', 'uses' => 'QueriesController@sales_index'));
  Route::get('pro_cat', array('as' => 'pro_cat.index', 'uses' => 'QueriesController@pro_cat_index'));
  Route::post('/orders/search','QueriesController@orders_search');
  Route::post('/sales/search','QueriesController@sales_search');
  Route::post('/pro_cat/search','QueriesController@pro_cat_search');
});

Route::group(array('before'=>'gerente'), function() { 
  Route::get('/trending/products',array('as' => 'products.trending', 'uses' => 'ProductsController@trending'));
});





Route::group(array('before'=>'auth.customer'), function() { 
  Route::get('signout', 'CustomersSessionsController@destroy');
  Route::get('index', array('as' => 'home.index', 'uses' => 'HomeController@index'));
  Route::get('search', array('as' => 'home.search', 'uses' => 'HomeController@search'));
  Route::get('show/{products}', array('as' => 'home.show', 'uses' => 'HomeController@show'));
  Route::get('wishlist', array('as' => 'home.wishlist', 'uses' => 'HomeController@wishlist'));
  Route::post('/wishlist/{products}',array('as' => 'home.add_to_wishlist', 'uses' => 'HomeController@add_to_wishlist'));
  Route::delete('/wishlist/{products}',array('as' => 'home.remove_wishlist_item', 'uses' => 'HomeController@remove_wishlist_item'));
  Route::get('cart', array('as' => 'home.cart', 'uses' => 'HomeController@cart'));
  Route::post('/cart/{products}',array('as' => 'home.add_to_cart', 'uses' => 'HomeController@add_to_cart'));
  Route::delete('/cart/{products}',array('as' => 'home.remove_cart_item', 'uses' => 'HomeController@remove_cart_item'));
  Route::get('/cards/create',array('as' => 'home.add_card', 'uses' => 'HomeController@add_card'));
  Route::post('/cards',array('as' => 'home.store_card', 'uses' => 'HomeController@store_card'));
  Route::get('/order/create',array('as' => 'home.add_order', 'uses' => 'HomeController@add_order'));
  Route::post('/order',array('as' => 'home.store_order', 'uses' => 'HomeController@store_order'));
});

Route::get('login', 'SessionsController@create');

Route::get('/', 'CustomersSessionsController@create');
Route::get('/signin', 'CustomersSessionsController@create');
Route::get('signup', 'CustomersSessionsController@signup');


Route::resource('sessions','SessionsController');
Route::resource('customers_sessions','CustomersSessionsController');




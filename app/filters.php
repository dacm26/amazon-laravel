<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

// new multiauth filter
Route::filter('auth.employee', function(){
    if (Auth::employee()->guest()){
        return Redirect::guest('login');
    }
});
Route::filter('super', function()
{ 
  if (Auth::employee()->guest()){
        return Redirect::guest('login');
    }
  if ( Auth::employee()->user()->role_id != 1) {
     // do something
     return Redirect::to('error'); 
   }
});


Route::filter('read-only', function()
{ 
   if (Auth::employee()->guest()){
        return Redirect::guest('login');
    }
});

Route::filter('contador', function()
{ 
   if (Auth::employee()->guest()){
        return Redirect::guest('login');
    }
    if ( Auth::employee()->user()->role_id == 1 ) {
     
      
   }
  else if ( Auth::employee()->user()->role_id == 3 or Auth::employee()->user()->role_id == 2) {
     // do something
     
   }else{
    return Redirect::to('error'); 
  }
});

Route::filter('gerente', function()
{ 
  if (Auth::employee()->guest()){
        return Redirect::guest('login');
    }
  if ( Auth::employee()->user()->role_id == 1 ) {
     
      
   }
  else if ( Auth::employee()->user()->role_id != 3) {
     // do something
     return Redirect::to('error'); 
   }
});
Route::filter('administrador', function()
{ 
      if (Auth::employee()->guest()){
        return Redirect::guest('login');
    }
  if ( Auth::employee()->user()->role_id == 1) {
     
      
   }
  else if ( Auth::employee()->user()->role_id != 4) {
     // do something
     return Redirect::to('error'); 
   }
}); 

Route::filter('auth.customer', function(){
   if (Auth::customer()->guest()){
        return Redirect::guest('signin');
    }
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

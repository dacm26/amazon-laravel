<?php

class CustomersSessionsController extends \BaseController {
  public function create(){
    if(!(Auth::customer()->guest())){
      return 'Hello Customer';
    }
    return View::make('customers_sessions.create');
  }
  
  public function store(){
        Auth::customer()->attempt(Input::only('email','password'));
        if(Auth::customer()->check()){
          return 'Hello Customer';
        }

        else{
          return Redirect::route('customers_sessions.create');
        }
        

  }
  
  public function destroy(){
    Auth::customer()->logout();
    return Redirect::route('customers_sessions.create');
  }

}
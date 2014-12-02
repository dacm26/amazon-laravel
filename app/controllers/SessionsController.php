<?php

class SessionsController extends \BaseController {
  public function create(){
    if(!(Auth::employee()->guest())){
      return Redirect::route('employees.index');
    }
    return View::make('sessions.create');
  }
  
  public function store(){
        Auth::employee()->attempt(Input::only('email','password'));
        if(Auth::employee()->check()){
          return Redirect::route('employees.index');
        }

        else{
          Session::flash('error', 'Invalid email or password.');
          return Redirect::route('sessions.create');
        }
        
  }
  
  public function destroy(){
    Auth::employee()->logout();
    //Auth::customer()->logout();
    return Redirect::route('sessions.create');
  }
}
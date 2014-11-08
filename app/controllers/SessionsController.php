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
        //Auth::customer()->attempt(Input::only('email','password'));
        if(Auth::employee()->check()){
          return Redirect::route('employees.index');
        }
        /*else if(Auth::customer()->check()){
          return 'hello customer';
        }*/
        else{
          return Redirect::route('sessions.create');
        }
        
    /*
    if(Auth::attempt(Input::only('email','password'))){
      return Redirect::route('employees.index');
    }
    return Redirect::route('sessions.create');*/
  }
  
  public function destroy(){
    Auth::employee()->logout();
    //Auth::customer()->logout();
    return Redirect::route('sessions.create');
  }
}
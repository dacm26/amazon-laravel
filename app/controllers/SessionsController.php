<?php

class SessionsController extends \BaseController {
  public function create(){
    if(Auth::check()){
      return Redirect::route('employees.index');
    }
    return View::make('sessions.create');
  }
  
  public function store(){
    if(Auth::attempt(Input::only('email','password'))){
      return Redirect::route('employees.index');
    }
    return Redirect::route('sessions.create');;
  }
  
  public function destroy(){
    Auth::logout();
    return Redirect::route('sessions.create');
  }
}
<?php

class SignController extends \BaseController {
 public function create(){
    return View::make('sign.create');
  }
  
  public function store(){
        Auth::customer()->attempt(Input::only('email','password'));
        if(Auth::customer()->check()){
          return 'Hello Customer';
        }
        else{
          return Redirect::route('sign.create');
        }
  }
  
  public function destroy(){
    Auth::customer()->logout();
    return Redirect::route('sign.create');
  }

}
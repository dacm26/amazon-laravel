<?php

class CustomersSessionsController extends \BaseController {
  public function create(){
    if(!(Auth::customer()->guest())){
          $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		      return View::make('home.index', compact('categories'));
    }
    return View::make('customers_sessions.create');
  }
  public function signup(){
    if(!(Auth::customer()->guest())){
          $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		      return View::make('home.index', compact('categories'));
    }
    return View::make('customers.create');
  }  
  public function store(){
        Auth::customer()->attempt(Input::only('email','password'));
        if(Auth::customer()->check()){
              $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		          return View::make('home.index', compact('categories'));
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
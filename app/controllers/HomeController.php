<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		return View::make('home.index', compact('categories'));
	}
	public function search()
	{
    $keyword=Input::get('keyword');
    $category=Input::get('category');
    $products=Product::where('name','LIKE','%'.$keyword.'%')->where('inactive','=', 0)->where('category_id','=',$category)->get();  
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		return View::make('home.search', compact('categories','products','keyword'));
	}
	public function show($id)
	{
    $product =Product::findOrFail($id);
    $product->visits=$product->visits+1;
    $product->save();
    $brand=Brand::findOrFail($product->brand_id);
    $category=Brand::findOrFail($product->category_id);
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
		return View::make('home.show', compact('categories','category','product','brand'));
	}  

}

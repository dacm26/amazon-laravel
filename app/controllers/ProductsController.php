<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of products
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
		return View::make('products.index', compact('products','categories','brands'));
	}

	/**
	 * Show the form for creating a new product
	 *
	 * @return Response
	 */
	public function create()
	{
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
		return View::make('products.create', compact('categories','brands'));
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules['create']);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Product::create($data);

		return Redirect::route('products.index');
	}

	/**
	 * Display the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
    $categories = Category::lists('name', 'id');
    $brands = Brand::lists('name', 'id');
		return View::make('products.show', compact('product','categories','brands'));
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
		return View::make('products.edit', compact('product','categories','brands'));
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Product::$rules['edit']);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$product->update($data);

		return Redirect::route('products.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	  $validator = Validator::make( $data= Input::all(), Product::$rules['destroy'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $product=Product::find($id);
    $product->inactive=true;
    $product->save();


		return Redirect::route('products.index');
	}

}
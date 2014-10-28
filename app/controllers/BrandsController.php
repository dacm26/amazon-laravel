<?php

class BrandsController extends \BaseController {

	/**
	 * Display a listing of brands
	 *
	 * @return Response
	 */
	public function index()
	{
		$brands = Brand::all();

		return View::make('brands.index', compact('brands'));
	}

	/**
	 * Show the form for creating a new brand
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('brands.create');
	}

	/**
	 * Store a newly created brand in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Brand::$rules);
    
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Brand::create($data);

		return Redirect::route('brands.index');
	}

	/**
	 * Display the specified brand.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$brand = Brand::findOrFail($id);

		return View::make('brands.show', compact('brand'));
	}

	/**
	 * Show the form for editing the specified brand.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$brand = Brand::find($id);

		return View::make('brands.edit', compact('brand'));
	}

	/**
	 * Update the specified brand in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$brand = Brand::findOrFail($id);
    
		$validator = Validator::make($data = Input::all(), Brand::$rules);
    
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$brand->update($data);

		return Redirect::route('brands.index');
	}

	/**
	 * Remove the specified brand from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Brand::destroy($id);

		return Redirect::route('brands.index');
	}

}

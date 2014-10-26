<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();

		return View::make('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new category
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('categories.create');
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::except('attribute_name_1','attribute_value_1','attribute_name_2','attribute_value_2','attribute_name_3','attribute_value_3'), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
    $category = new Category($data);
    $category->save();
    
    $attribute_1= new Attribute;
    $attribute_1->name=Input::get('attribute_name_1');
    $attribute_1->value=Input::get('attribute_value_1');
    $attribute_1->category_id=$category->id;
    $attribute_1->save();
    
    $attribute_2= new Attribute;
    $attribute_2->name=Input::get('attribute_name_2');
    $attribute_2->value=Input::get('attribute_value_2');
    $attribute_2->category_id=$category->id;
    $attribute_2->save();
    
    $attribute_3= new Attribute;
    $attribute_3->name=Input::get('attribute_name_3');
    $attribute_3->value=Input::get('attribute_value_3');
    $attribute_3->category_id=$category->id;
    $attribute_3->save();
    
    return Redirect::route('categories.index');
	}

	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $attributes = Attribute::where('category_id', '=', $id)->get();
		$category = Category::findOrFail($id);

		return View::make('categories.show', compact('category','attributes'));
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);
    $attributes = Attribute::where('category_id', '=', $id)->get();
		return View::make('categories.edit', compact('category','attributes'));
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$category->update($data);

		return Redirect::route('categories.index');
	}

	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Category::destroy($id);

		return Redirect::route('categories.index');
	}

}

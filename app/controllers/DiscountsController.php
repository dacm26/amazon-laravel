<?php

class DiscountsController extends \BaseController {

  /**
   * Display a listing of discounts
   *
   * @return Response
   *
   
   /**/
  public function index()
  {
    $discounts = Discount::where('inactive', '=', 0)->get();
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
    return View::make('discounts.index', compact('discounts','categories','brands'));
  }
  /**
  ***************
  public function search()
  {
    $keyword = Input::get('keyword');
    if(!($keyword == '')){
      $discounts=Discount::where('name','LIKE','%'.$keyword.'%')->get();  
    }
    else{
     $discounts = Discount::where('inactive', '=', 0)->get();
    }
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
    return View::make('discounts.index', compact('discounts','categories','brands'));
  }
  /**
   * Show the form for creating a new discount
   *
   * @return Response
   */
  public function create()
  {
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
    return View::make('discounts.create', compact('categories','brands'));
  }

  /**
   * Store a newly created discount in storage.
   *
   * @return Response
   */
  public function store()
  {
    $validator = Validator::make($data = Input::all(), Discount::$rules['create']);


    $discount = new Discount(Input::all());
    $discount->updated_by=Auth::employee()->user()->email;
    $discount->save();
    return Redirect::route('discounts.index');
  }

  /**
   * Display the specified discount.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $discount = Discount::findOrFail($id);
    $categories = Category::lists('name', 'id');
    $brands = Brand::lists('name', 'id');
    return View::make('discounts.show', compact('discount','categories','brands'));
  }

  /**
   * Show the form for editing the specified discount.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $discount = Discount::find($id);
    $categories = Category::where('inactive','=','false')->get()->lists('name','id');
    $brands = Brand::where('inactive','=','false')->get()->lists('name','id');
    return View::make('discounts.edit', compact('discount','categories','brands'));
  }

  /**
   * Update the specified discount in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    try{
    $discount = Discount::findOrFail($id);

    $validator = Validator::make($data = Input::all(), Discount::$rules['edit']);


    $discount->update($data);
    $discount->updated_by=Auth::employee()->user()->email;
    $discount->save();
    return Redirect::route('discounts.index');
        }
    catch(Exception $e){
      return Redirect::back()->withErrors($validator)->withInput();
    }
  }

  /**
   * Remove the specified discount from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $validator = Validator::make( $data= Input::all(), Discount::$rules['destroy'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $discount=Discount::find($id);
    $discount->inactive=true;
    $discount->save();


    return Redirect::route('discounts.index');
  }

}

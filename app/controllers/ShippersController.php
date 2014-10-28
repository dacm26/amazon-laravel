<?php

class ShippersController extends \BaseController {

	/**
	 * Display a listing of shippers
	 *
	 * @return Response
	 */
	public function index()
	{
		$shippers = Shipper::all();

		return View::make('shippers.index', compact('shippers'));
	}

	/**
	 * Show the form for creating a new shipper
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('shippers.create');
	}

	/**
	 * Store a newly created shipper in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Shipper::$rules['create']);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Shipper::create($data);

		return Redirect::route('shippers.index');

	}

	/**
	 * Display the specified shipper.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$shipper = Shipper::findOrFail($id);

		return View::make('shippers.show', compact('shipper'));
	}

	/**
	 * Show the form for editing the specified shipper.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shipper = Shipper::find($id);

		return View::make('shippers.edit', compact('shipper'));
	}

	/**
	 * Update the specified shipper in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    try{
		$shipper = Shipper::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Shipper::$rules['edit']);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$shipper->update($data);

		return Redirect::route('shippers.index');
        }
    catch(Exception $e){
      return Redirect::back()->withErrors($validator)->withInput();
    }
	}

	/**
	 * Remove the specified shipper from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	  $validator = Validator::make( $data= Input::all(), Shipper::$rules['destroy'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $shipper=Shipper::find($id);
    $shipper->inactive=true;
    $shipper->save();

		return Redirect::route('shippers.index');
	}

}

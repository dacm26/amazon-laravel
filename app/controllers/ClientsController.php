<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of Clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();

		return View::make('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new Client
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create');
	}
  /** Llenar Combobox de la view

	/**
	 * Store a newly created Client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $validator = Validator::make( Input::all(), Client::$rules['create'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $Client = new Client(Input::all());
    $Client->save();
    return Redirect::route('Clients.index');
    /*
    $Client = new Client();
    if(! $Client->save())
    {
      return Redirect::back()->withErrors($Client->getErrors())->withInput();
    }

		return Redirect::route('Clients.index');
    */
	}

	/**
	 * Display the specified Client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Client = Client::findOrFail($id);
		return View::make('Clients.show', compact('Client'));
	}

	/**
	 * Show the form for editing the specified Client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Client = Client::find($id);
		return View::make('Clients.edit', compact('Client'));
	}

	/**
	 * Update the specified Client in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    
    $validator = Validator::make( $data= Input::all(), Client::$rules['edit'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $Client = Client::findOrFail($id);
    $Client->update($data);
    return Redirect::route('Clients.index');
    
    
    /*
		$Client = Client::findOrFail($id);
    if(! $Client->update(Input::all()))
    {
      return Redirect::back()->withErrors($Client->getErrors())->withInput();
    }
    
		return Redirect::route('Clients.index');*/
	}

	/**
	 * Remove the specified Client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Client::destroy($id);

		return Redirect::route('Clients.index');
	}

}


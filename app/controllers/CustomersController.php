<?php
use Carbon\Carbon;
class CustomersController extends \BaseController {

	/**
	 * Display a listing of customers
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = Customer::all();

		return View::make('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new customer
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('customers.create');
	}

	/**
	 * Store a newly created customer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $validator = Validator::make( Input::all(), Customer::$rules['create'] );
    $birthday=new Carbon(Input::get('birthday'));
    $today= Carbon::now();
    $birthday=$birthday->year;
    $today=$today->year;
    $result=$today-$birthday;
    if ( $validator->fails() or $result<18) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $customer = new Customer(Input::all());
    $customer->save();
    return Redirect::route('customers.index');
	}

	/**
	 * Display the specified customer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = Customer::findOrFail($id);

		return View::make('customers.show', compact('customer'));
	}

	/**
	 * Show the form for editing the specified customer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = Customer::find($id);

		return View::make('customers.edit', compact('customer'));
	}

	/**
	 * Update the specified customer in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    try{
    $validator = Validator::make( $data= Input::all(), Customer::$rules['edit'] ); 
    $birthday=new Carbon(Input::get('birthday'));
    $today= Carbon::now();
    $birthday=$birthday->year;
    $today=$today->year;
    $result=$today-$birthday;
    if ( $validator->fails() or $result<18) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $customer = Customer::findOrFail($id);
    $customer->update($data);
    return Redirect::route('customers.index');
    
        }
    catch(Exception $e){
      return Redirect::back()->withErrors($validator)->withInput();
    }
	}

	/**
	 * Remove the specified customer from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	  $validator = Validator::make( $data= Input::all(), Customer::$rules['destroy'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $customer=Customer::find($id);
    $customer->inactive=true;
    $customer->save();

		return Redirect::route('customers.index');
	}

}

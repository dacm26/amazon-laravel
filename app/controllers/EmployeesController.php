<?php

class EmployeesController extends \BaseController {

	/**
	 * Display a listing of employees
	 *
	 * @return Response
	 */
	public function index()
	{
    $roles = Role::where('inactive','=','false')->get()->lists('name','id');
		$employees = Employee::all();
		return View::make('employees.index', compact('employees','roles'));
	}

	/**
	 * Show the form for creating a new employee
	 *
	 * @return Response
	 */
	public function create()
	{
    $roles = Role::where('inactive','=','false')->get()->lists('name','id');
		return View::make('employees.create', compact('roles'));
	}
  /** Llenar Combobox de la view

	/**
	 * Store a newly created employee in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $validator = Validator::make( Input::all(), Employee::$rules['create'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $employee = new Employee(Input::all());
    $employee->save();
    return Redirect::route('employees.index');
    /*
    $employee = new Employee();
    if(! $employee->save())
    {
      return Redirect::back()->withErrors($employee->getErrors())->withInput();
    }

		return Redirect::route('employees.index');
    */
	}

	/**
	 * Display the specified employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $roles = Role::lists('name', 'id');
		$employee = Employee::findOrFail($id);
		return View::make('employees.show', compact('employee','roles'));
	}

	/**
	 * Show the form for editing the specified employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employee = Employee::find($id);
    $roles = Role::where('inactive','=','false')->get()->lists('name','id');
		return View::make('employees.edit', compact('employee','roles'));
	}

	/**
	 * Update the specified employee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    
    $validator = Validator::make( $data= Input::all(), Employee::$rules['edit'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $employee = Employee::findOrFail($id);
    $employee->update($data);
    return Redirect::route('employees.index');
    
    
    /*
		$employee = Employee::findOrFail($id);
    if(! $employee->update(Input::all()))
    {
      return Redirect::back()->withErrors($employee->getErrors())->withInput();
    }
    
		return Redirect::route('employees.index');*/
	}

	/**
	 * Remove the specified employee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	  $validator = Validator::make( $data= Input::all(), Employee::$rules['destroy'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $employee=Employee::find($id);
    $employee->inactive=true;
    $employee->save();

		return Redirect::route('employees.index');
	}

}

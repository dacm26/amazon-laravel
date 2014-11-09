<?php
use Carbon\Carbon;
class EmployeesController extends \BaseController {

	/**
	 * Display a listing of employees
	 *
	 * @return Response
	 */
	public function index()
	{
    $roles = Role::where('inactive','=','false')->get()->lists('name','id');
		$employees = Employee::where('inactive', '=', 0)->get();
		return View::make('employees.index', compact('employees','roles'));
	}
  public function search()
	{
    $keyword = Input::get('keyword');
    $roles = Role::where('inactive','=','false')->get()->lists('name','id');
    if(!($keyword == '')){
      $employees=Employee::where('name','LIKE','%'.$keyword.'%')->get();  
    }
    else{
      $employees = Employee::where('inactive', '=', 0)->get();
    }
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
    $birthday=new Carbon(Input::get('birthday'));
    $today= Carbon::now();
    $birthday=$birthday->year;
    $today=$today->year;
    $result=$today-$birthday;
    if ( $validator->fails() or $result<18) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $employee = new Employee(Input::all());
    $employee->updated_by=Auth::employee()->user()->email;
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
    try{
    $validator = Validator::make( $data= Input::all(), Employee::$rules['edit'] ); 
    $birthday=new Carbon(Input::get('birthday'));
    $today= Carbon::now();
    $birthday=$birthday->year;
    $today=$today->year;
    $result=$today-$birthday;
    if ( $validator->fails() or $result<18) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $employee = Employee::findOrFail($id);
    $employee->update($data);
      $employee->updated_by=Auth::employee()->user()->email;
      $employee->save();
    return Redirect::route('employees.index');
    
        }
    catch(Exception $e){
      return Redirect::back()->withErrors($validator)->withInput();
    }
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

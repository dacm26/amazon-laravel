<?php

class RolesController extends \BaseController {

	/**
	 * Display a listing of roles
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::where('inactive', '=', 0)->get();

		return View::make('roles.index', compact('roles'));
	}
  public function search()
	{
    $keyword = Input::get('keyword');
    
    if(!($keyword == '')){
      $roles=Role::where('name','LIKE','%'.$keyword.'%')->get();  
    }
    else{
      $roles = Role::where('inactive', '=', 0)->get();
    }
   
		return View::make('roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new role
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('roles.create');
	}

	/**
	 * Store a newly created role in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::all(), Role::$rules['create']);

        if ($validator->fails())
        {
          return Redirect::back()->withErrors($validator)->withInput();
        }

        $role= new Role($data);
        $role->updated_by=Auth::employee()->user()->email;
        $role->save();
      

		return Redirect::route('roles.index');
	}

	/**
	 * Display the specified role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::findOrFail($id);

		return View::make('roles.show', compact('role'));
	}

	/**
	 * Show the form for editing the specified role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::find($id);

		return View::make('roles.edit', compact('role'));
	}

	/**
	 * Update the specified role in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    try{
    $validator = Validator::make( $data= Input::all(), Role::$rules['edit'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $role = Role::findOrFail($id);
    $role->update($data);
            $role->updated_by=Auth::employee()->user()->email;
        $role->save();
		return Redirect::route('roles.index');
    }
    catch(Exception $e){
      Session::flash('duplicate', 'The name has already been taken.');
      return Redirect::back()->withErrors($validator)->withInput();
    }
	}

	/**
	 * Remove the specified role from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    $validator = Validator::make( $data= Input::all(), Role::$rules['destroy'] ); 
    if ( $validator->fails() ) { 
        return Redirect::back()->withErrors($validator)->withInput();
    }
    $role=Role::find($id);
    $role->inactive=true;
    $role->save();
		return Redirect::route('roles.index');
	}

}

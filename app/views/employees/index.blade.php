@extends('layouts.default')

@section('content')

  @if (count($roles) >= 1)
    <h1 class="page-header">All Employees</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover">
       <thead>
           <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th></th>
             <th></th>
             <th></th>
          </tr>
       </thead>
      <tbody>
       @foreach($employees as $employee)
        @if (!($employee->inactive))
          <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{ (Role::find($employee->role_id)->name) }}</td>
            <td><button class="btn btn-default">{{ link_to_show_employee($employee)  }} </button></td>
            <td><button  class="btn btn-default">{{ link_to_edit_employee($employee)  }}</button></td>
            <td>{{ Form::open(array('route' => array('employees.destroy', $employee->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>
        @endif
       @endforeach
       </tbody>
    </table>
  @else
      <h1>You need to have roles, to create employees!!</h1>
  @endif
                                  </div>
        </div>
      </div> 
@stop
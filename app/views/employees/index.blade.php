@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Employees</h2>
    <table class="table table-striped">
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
          <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{ (Role::find($employee->role_id)->name) }}</td>
            <td colspan="2"> {{ link_to_show_employee($employee)  }} || {{ link_to_edit_employee($employee)  }}  </td>
            <td>{{ Form::open(array('route' => array('employees.destroy', $employee->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>

       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_employee()  }}</p>
</div>
@stop
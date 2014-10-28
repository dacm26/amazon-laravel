@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
<h2>Show Employee</h2>

<p>
  <strong>Name:</strong>
  {{ $employee->name }}
</p>

<p>
  <strong>Email:</strong>
  {{ $employee->email }}
</p>
  
<p>
  <strong>Birthday:</strong>
  {{ $employee->birthday }}
</p>
  
<p>
  <strong>Mobile:</strong>
  {{ $employee->mobile }}
</p>
  
<p>
  <strong>Gender:</strong>
  {{ $employee->gender }}
</p>

<p>
  <strong>Role:</strong>
   {{ (Role::find($employee->role_id)->name) }} 
</p>
  
  
  

{{ link_to_edit_employee($employee)  }}
{{ link_to_route('employees.index','Back') }}

</div>
@stop
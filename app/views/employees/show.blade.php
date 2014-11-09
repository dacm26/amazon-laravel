@extends('layouts.default')

@section('content')
    @if (count($roles) >= 1)
<h1 class="page-header">Show Employee</h1>
<br>
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
<p>
  <strong>Inactive:</strong>
  @if($employee->inactive)
      Yes
  @else
      No
  @endif
</p>  
<p>
  <strong>Created At:</strong>
  {{ $employee->created_at }}
</p>

<p>
  <strong>Updated At:</strong>
  {{ $employee->updated_at }}
</p>   
<p>
<strong>Updated By:</strong>
  {{ $employee->updated_by }}
</p>  

{{ link_to_edit_employee($employee)  }}
{{ link_to_route('employees.index','Back') }}
    @else
          <h1>You need to have roles, to create employees!!</h1>
    @endif
@stop
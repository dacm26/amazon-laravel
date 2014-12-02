@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Role</h1>
<br>

<p>
  <strong>Name:</strong>
  {{ $role->name }}
</p>
<p>
  <strong>Inactive:</strong>
  @if($role->inactive)
      Yes
  @else
      No
  @endif
</p>
<p>
  <strong>Created At:</strong>
  {{ $role->created_at }}
</p>

<p>
  <strong>Updated At:</strong>
  {{ $role->updated_at }}
</p>
<p>
  <strong>Updated By:</strong>
  {{ $role->updated_by }}
</p>
<br>
<br>
<h4>Authorize:</h4>
@if($role->name == 'Super')
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Roles.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Employees.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Brands.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Categories.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Shippers.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Discounts.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Products.</input><br>
<input type="checkbox" onclick="return false" checked>Read and List Customers.</input><br>
<input type="checkbox" onclick="return false" checked>Read and Update Tax.</input><br>
<input type="checkbox" onclick="return false" checked>List Trending Products.</input><br>
<input type="checkbox" onclick="return false" checked>Accounting Queries.</input><br>
@elseif($role->name == 'Contador')
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Roles<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Employees<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Brands<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Categories<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Shippers<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Discounts<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Products<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" checked>Read and List Customers.</input><br>
<input type="checkbox" onclick="return false" >Read and Update Tax<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >List Trending Products.</input><br>
<input type="checkbox" onclick="return false" checked>Accounting Queries.</input><br>
@elseif($role->name == 'Gerente')
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Roles<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Employees<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Brands<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Categories<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Shippers<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Discounts<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" >Create, Read, Update, Delete Products<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" checked>Read and List Customers.</input><br>
<input type="checkbox" onclick="return false" >Read and Update Tax<strong>(read-only permission granted)</strong>.</input><br>
<input type="checkbox" onclick="return false" checked>List Trending Products.</input><br>
<input type="checkbox" onclick="return false" checked>Accounting Queries.</input><br>
@elseif($role->name == 'Gerente Administrativo')
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Roles.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Employees.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Brands.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Categories.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Shippers.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Discounts.</input><br>
<input type="checkbox" onclick="return false" checked>Create, Read, Update, Delete Products.</input><br>
<input type="checkbox" onclick="return false" checked>Read and List Customers.</input><br>
<input type="checkbox" onclick="return false" checked>Read and Update Tax.</input><br>
<input type="checkbox" onclick="return false" >List Trending Products.</input><br>
<input type="checkbox" onclick="return false" >Accounting Queries.</input><br>
@endif
    

<br>
{{ link_to_edit_role($role)  }}
{{ link_to_route('roles.index','Back') }}

@stop
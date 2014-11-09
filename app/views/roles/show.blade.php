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
{{ link_to_edit_role($role)  }}
{{ link_to_route('roles.index','Back') }}

@stop
@extends('layouts.default')

@section('content')
<div class= "container col-md-6 col-md-offset-3">
<h2>Show Role</h2>

<p>
  <strong>Name:</strong>
  {{ $role->name }}
</p>

{{ link_to_edit_role($role)  }}
{{ link_to_route('roles.index','Back') }}

</div>
@stop
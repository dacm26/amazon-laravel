@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Role</h1>
<br>

<p>
  <strong>Name:</strong>
  {{ $role->name }}
</p>

{{ link_to_edit_role($role)  }}
{{ link_to_route('roles.index','Back') }}

@stop
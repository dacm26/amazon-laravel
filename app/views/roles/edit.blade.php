@extends('layouts.default')

@section('content')
    <h2>Edit Role</h2>


    
    {{ Form::open(array('route' => array('roles.update', $role->id), 'method' => 'put')) }}
        <div>
          {{ Form::label('name','Name: ') }}
          {{ Form::text('name', $role->name) }}
        </div>
          
        
        <div>
           {{ Form::submit('Edit Role') }}
        </div>
    {{ Form::close() }}
@stop
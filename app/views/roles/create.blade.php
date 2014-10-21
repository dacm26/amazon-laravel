@extends('layouts.default')

@section('content')
    <h2>Create Role</h2>


    
    {{ Form::open(array('route' => array('roles.store'), 'method' => 'post')) }}
        <div>
          {{ Form::label('name','Name: ') }}
          {{ Form::text('name') }}
        </div>
          
        
        <div>
           {{ Form::submit('Create Role') }}
        </div>
    {{ Form::close() }}
@stop
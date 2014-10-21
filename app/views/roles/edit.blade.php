@extends('layouts.default')

@section('content')
  <div class= "container col-md-4 col-md-offset-4">
    <h2>Edit Role</h2>


    
    {{ Form::open(array('route' => array('roles.update', $role->id),'class'=>'form', 'method' => 'put')) }}
        <div class="form-group">
          {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
          {{ Form::text('name', $role->name,['class' => 'form-control']) }}
          {{ $errors->first('name') }}
        </div>
          
        
        <div class="container col-sm-4 col-sm-offset-4">
           {{ Form::submit('Edit Role',['class' => 'btn btn-default']) }}
           {{ link_to_route('roles.index','Back') }}
        </div>
    {{ Form::close() }}
</div>
@stop
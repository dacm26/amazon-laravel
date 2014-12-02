@extends('layouts.default')

@section('content')
    @if (!($role->inactive))
    <h1 class="page-header">Edit Role</h1>
    <br>

    
    {{ Form::open(array('route' => array('roles.update', $role->id),'class'=>'form', 'method' => 'put')) }}
        <div class="form-group">
          {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
          {{ Form::text('name', $role->name,['class' => 'form-control']) }}
          {{ $errors->first('name') }}
            @if ($message = Session::get('duplicate'))
              {{ $message }}
            @endif
        </div>
          
        
        <div class="container col-sm-4 col-sm-offset-4">
           {{ Form::submit('Save',['class' => 'btn btn-default']) }}
           {{ link_to_route('roles.index','Back') }}
        </div>
    {{ Form::close() }}
    @else
      <h1>This role is inactive!!</h1>
    @endif
@stop
@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">

      <h2>Edit Employee</h2>

      {{ Form::open(array('route' => array('employees.update', $employee->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$employee->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      


          <div class="form-group">
            {{ Form::label('birthday','Birthday: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'birthday', $employee->birthday, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('birthday') }}
          </div>
      

          <div class="form-group">
            {{ Form::label('role_id','Role: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('role_id', $roles,$employee->role_id) }}
            {{ $errors->first('role_id') }}
          </div>
          
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Edit Employee',['class' => 'btn btn-default']) }}
             {{ link_to_route('employees.index','Back') }}
          </div>
      {{ Form::close() }}
    </div>
@stop
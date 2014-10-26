@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">

      <h2>Create Shipper</h2>

      {{ Form::open(array('route' => array('shippers.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',"",['class' => 'form-control']) }}
            {{ $errors->first('mobile') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',"",['class' => 'form-control']) }}
            {{ $errors->first('email') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('porcentage','Porcentage: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::number('porcentage',"",['class' => 'form-control']) }}
            {{ $errors->first('porcentage') }}
          </div>
        
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Shipper',['class' => 'btn btn-default']) }}
             {{ link_to_route('shippers.index','Back') }}
          </div>
      
      {{ Form::close() }}
    </div>
@stop
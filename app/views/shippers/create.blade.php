@extends('layouts.default')

@section('content')

      <h1 class="page-header">Create Shipper</h1>
      <br>
      {{ Form::open(array('route' => array('shippers.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',"",array('placeholder'=>'31457825','class' => 'form-control')) }}
            {{ $errors->first('mobile') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',"",array('placeholder'=>'example@test.com','class' => 'form-control')) }}
            {{ $errors->first('email') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('percentage','Percentage: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('percentage',"",array('placeholder'=>'10.50','class' => 'form-control')) }}
            {{ $errors->first('percentage') }}
          </div>
        
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Shipper',['class' => 'btn btn-default']) }}
             {{ link_to_route('shippers.index','Back') }}
          </div>
      
      {{ Form::close() }}
@stop
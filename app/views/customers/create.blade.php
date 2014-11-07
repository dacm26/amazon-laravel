@extends('layouts.default')

@section('content')
      <h1 class="page-header">Create Customer</h1>
       <br>
      {{ Form::open(array('route' => array('customers.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',"",array('placeholder'=>'example@test.com','class' => 'form-control')) }}
            {{ $errors->first('email') }}
          </div>

          <div class="form-group">
            {{ Form::label('birthday','Birthday: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'birthday', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('birthday') }}
          </div>
      
           <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',"",array('placeholder'=>'31314545','class' => 'form-control')) }}
            {{ $errors->first('mobile') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('address','Shipping Address: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::textarea ('address',"",['class' => 'form-control']) }}
            {{ $errors->first('address') }}
          </div>
          
          
          <div class="form-group">
            {{ Form::label('postal_code','Postal Code: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('postal_code',"",array('placeholder'=>'10111','class' => 'form-control')) }}
            {{ $errors->first('postal_code') }}
          </div>

          
          <div class="form-group">
            {{ Form::label('gender','Gender: ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::radio('gender','M ',['class' => 'exampleInputEmail1']) }} <label>Male</label><br>
            {{ Form::radio('gender', 'F', true) }}<label> Female</label>
          </div>

          <div class="form-group">
            {{ Form::label('password','Password: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::password('password',['class' => 'form-control']) }}
            {{ $errors->first('password') }}
          </div>
          
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Customer',['class' => 'btn btn-default']) }}
             {{ link_to_route('customers.index','Back') }}
          </div>
      {{ Form::close() }}
      

@stop
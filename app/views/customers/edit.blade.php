@extends('layouts.default')

@section('content')
      <h1 class="page-header">Edit Customer</h1>
       <br>
      {{ Form::open(array('route' => array('customers.update', $customer->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$customer->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',$customer->email,['class' => 'form-control']) }}
            {{ $errors->first('email') }}
          </div>

          <div class="form-group">
            {{ Form::label('birthday','Birthday: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'birthday', $customer->birthday, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('birthday') }}
          </div>
      
           <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',$customer->mobile,['class' => 'form-control']) }}
            {{ $errors->first('mobile') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('address','Shipping Address: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::textarea ('address',$customer->address,['class' => 'form-control']) }}
            {{ $errors->first('address') }}
          </div>
          
          
          <div class="form-group">
            {{ Form::label('postal_code','Postal Code: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('postal_code',$customer->postal_code,['class' => 'form-control']) }}
            {{ $errors->first('postal_code') }}
          </div>

          @if( ($customer->gender) == 'F')
              <div class="form-group">
                {{ Form::label('gender','Gender: ',['class' => 'exampleInputEmail1']) }}<br>
                {{ Form::radio('gender','M') }} <label>Male</label><br>
                {{ Form::radio('gender', 'F', true) }}<label> Female</label>
              </div>
          @else
              <div class="form-group">
                {{ Form::label('gender','Gender: ',['class' => 'exampleInputEmail1']) }}<br>
                {{ Form::radio('gender','M',true) }} <label>Male</label><br>
                {{ Form::radio('gender', 'F') }}<label> Female</label>
              </div>
          @endif
          
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('customers.index','Back') }}
          </div>
      {{ Form::close() }}
      

@stop
@extends('layouts.default')

@section('content')
    @if ((!($shipper->inactive)))
      <h1 class="page-header">Edit Shipper</h1>
      <br>
      {{ Form::open(array('route' => array('shippers.update', $shipper->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$shipper->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
          <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',$shipper->mobile,['class' => 'form-control']) }}
            {{ $errors->first('mobile') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',$shipper->email,['class' => 'form-control']) }}
            {{ $errors->first('email') }}
          </div>
          <div class="form-group">
            {{ Form::label('percentage','Percentage: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('percentage',$shipper->percentage,['class' => 'form-control']) }}
            {{ $errors->first('percentage') }}
          </div>



          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('shippers.index','Back') }}
          </div>
      {{ Form::close() }}
      @else
          <h1>This shipper is inactive!!</h1>
      @endif
@stop
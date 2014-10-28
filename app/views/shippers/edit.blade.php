@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">
    @if ((!($shipper->inactive)))
      <h2>Edit Shipper</h2>

      {{ Form::open(array('route' => array('shippers.update', $shipper->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$shipper->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('porcentage','Porcentage: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('porcentage',$shipper->porcentage,['class' => 'form-control']) }}
            {{ $errors->first('porcentage') }}
          </div>



          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('shippers.index','Back') }}
          </div>
      {{ Form::close() }}
      @else
          <h1>This shipper is inactive!!</h1>
      @endif
    </div>
@stop
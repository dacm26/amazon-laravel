@extends('layouts.default')

@section('content')
      <h1 class="page-header">Edit Tax</h1>
      <br>
      {{ Form::open(array('route' => array('taxes.update', $tax->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('value','Value: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('value',$tax->value,['class' => 'form-control']) }}
            {{ $errors->first('value') }}
          </div>

          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('taxes.show','Back') }}
          </div>
      {{ Form::close() }}
@stop
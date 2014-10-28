@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">

      <h2>Create Brand</h2>

      {{ Form::open(array('route' => array('brands.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Brand',['class' => 'btn btn-default']) }}
             {{ link_to_route('brands.index','Back') }}
          </div>
      {{ Form::close() }}
    </div>
@stop
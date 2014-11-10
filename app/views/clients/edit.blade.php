@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">

      <h2>Edit Client</h2>

      {{ Form::open(array('route' => array('clients.update', $client->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$client->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      


          <div class="form-group">
            {{ Form::label('birthday','Birthday: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'birthday', $client->birthday, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('birthday') }}
          </div>
      
          
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Edit Client',['class' => 'btn btn-default']) }}
             {{ link_to_route('clients.index','Back') }}
          </div>
      {{ Form::close() }}
    </div>
@stop
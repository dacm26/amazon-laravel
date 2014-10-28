@extends('layouts.default')

@section('content')
  <div class= "container col-md-4 col-md-offset-4">
    @if (!($brand->inactive))
    <h2>Edit Brand</h2>


    
    {{ Form::open(array('route' => array('brands.update', $brand->id),'class'=>'form', 'method' => 'put')) }}
        <div class="form-group">
          {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
          {{ Form::text('name', $brand->name,['class' => 'form-control']) }}
          {{ $errors->first('name') }}
        </div>
          
        
        <div class="container col-sm-4 col-sm-offset-4">
           {{ Form::submit('Save',['class' => 'btn btn-default']) }}
           {{ link_to_route('brands.index','Back') }}
        </div>
    {{ Form::close() }}
    @else
      <h1>This brand is inactive!!</h1>
    @endif
</div>
@stop
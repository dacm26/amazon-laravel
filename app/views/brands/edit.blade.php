@extends('layouts.default')

@section('content')
    @if (!($brand->inactive))
    <h1 class="page-header">Edit Brand</h1>
    <br>

    
    {{ Form::open(array('route' => array('brands.update', $brand->id),'class'=>'form', 'method' => 'put')) }}
        <div class="form-group">
          {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
          {{ Form::text('name', $brand->name,['class' => 'form-control']) }}
          {{ $errors->first('name') }}
            @if ($message = Session::get('duplicate'))
              {{ $message }}
            @endif
        </div>
          
        
        <div class="container col-sm-4 col-sm-offset-4">
           {{ Form::submit('Save',['class' => 'btn btn-default']) }}
           {{ link_to_route('brands.index','Back') }}
        </div>
    {{ Form::close() }}
    @else
      <h1>This brand is inactive!!</h1>
    @endif
@stop
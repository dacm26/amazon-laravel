@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">
     @if (!($category->inactive))
      <h2>Edit Category</h2>

      {{ Form::open(array('route' => array('categories.update', $category->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$category->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      
          <div class="form-group">
            {{ Form::label('description','Description: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::textarea ('description',$category->description,['class' => 'form-control']) }}
            {{ $errors->first('description') }}
          </div>
                  

          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('categories.index','Back') }}
          </div>
      {{ Form::close() }}
      @else
      <h1>This category is inactive!!</h1>
    @endif
  </div>
@stop
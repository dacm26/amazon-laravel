@extends('layouts.default')

@section('content')
     @if (!($category->inactive))
      <h1 class="page-header">Edit Category</h1>
      <br>
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
           
          <div class="form-group">
            {{ Form::label('code','Code: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('code',$category->code,['class' => 'form-control']) }}
            {{ $errors->first('code') }}
          </div>
          @if( ($category->tax_free) == 1)
              <div class="form-group">
            {{ Form::label('tax_free','Tax Free: ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::radio('tax_free','1',true) }} <label>Yes</label><br>
            {{ Form::radio('tax_free', '0') }}<label> No</label>
              </div>
          @else
              <div class="form-group">
            {{ Form::label('tax_free','Tax Free: ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::radio('tax_free','1') }} <label>Yes</label><br>
            {{ Form::radio('tax_free', '0', true) }}<label> No</label>
              </div>
          @endif
          

          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('categories.index','Back') }}
          </div>
      {{ Form::close() }}
      @else
      <h1>This category is inactive!!</h1>
    @endif
@stop
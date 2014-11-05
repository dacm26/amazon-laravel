@extends('layouts.default')

@section('content')
  @if (count($brands) >= 1 and count($categories) >= 1)
      <h1 class="page-header">Create Product</h1>
      <br>
      {{ Form::open(array('route' => array('products.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('code','Code: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('code',"",['class' => 'form-control']) }}
            {{ $errors->first('code') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('price','Price: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('price',"",['class' => 'form-control']) }}
            {{ $errors->first('price') }}
          </div>
          
           <div class="form-group">
            {{ Form::label('units_in_stock','Units in Stock: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::number('units_in_stock',"",['class' => 'form-control']) }}
            {{ $errors->first('units_in_stock') }}
          </div>
      
           <div class="form-group">
            {{ Form::label('threshold','Threshold: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::number('threshold',"",['class' => 'form-control']) }}
            {{ $errors->first('threshold') }}
          </div>
      

          <div class="form-group">
            {{ Form::label('brand_id','Brand: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('brand_id', $brands) }}
            {{ $errors->first('brand_id') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('category_id','Category: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('category_id', $categories) }}
            {{ $errors->first('category_id') }}
          </div>
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Product',['class' => 'btn btn-default']) }}
             {{ link_to_route('products.index','Back') }}
          </div>
      {{ Form::close() }}
    @else
          <h1>You need to have brands and categories, to create products!!</h1>
    @endif
  
@stop
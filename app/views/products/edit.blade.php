@extends('layouts.default')

@section('content')
    <div class= "container col-md-4 col-md-offset-4">

      <h2>Edit Product</h2>

      {{ Form::open(array('route' => array('products.update', $product->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$product->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('price','Price: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('price',$product->price,['class' => 'form-control']) }}
            {{ $errors->first('price') }}
          </div>
          
           <div class="form-group">
            {{ Form::label('units_in_stock','Units in Stock: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::number('units_in_stock',$product->units_in_stock,['class' => 'form-control']) }}
            {{ $errors->first('units_in_stock') }}
          </div>
      
           <div class="form-group">
            {{ Form::label('threshold','Threshold: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::number('threshold',$product->threshold,['class' => 'form-control']) }}
            {{ $errors->first('threshold') }}
          </div>
      

          <div class="form-group">
            {{ Form::label('brand_id','Brand: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('brand_id', $brands,$product->brand_id) }}
            {{ $errors->first('brand_id') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('category_id','Category: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('category_id', $categories,$product->category_id) }}
            {{ $errors->first('category_id') }}
          </div>
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Edit Product',['class' => 'btn btn-default']) }}
             {{ link_to_route('products.index','Back') }}
          </div>
      {{ Form::close() }}
    </div>
@stop
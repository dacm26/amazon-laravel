@extends('layouts.default')

@section('content')
  @if (count($brands) >= 1 and count($categories) >= 1)
      <h1 class="page-header">Create Discount</h1>
      <br>
      {{ Form::open(array('route' => array('discounts.store'),'class'=>'form', 'method' => 'post')) }}

           <div class="form-group">
            {{ Form::label('discount','Discount: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('discount',"",array('placeholder'=>'10.50','class' => 'form-control')) }}
            {{ $errors->first('discount') }}
          </div>

          <div class="form-group">
            {{ Form::label('datestart','Start Date: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'datestart', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('datestart') }}
          </div>     

          <div class="form-group">
            {{ Form::label('dateend','End Date: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'dateend', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('dateend') }}
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
             {{ Form::submit('Create Discount',['class' => 'btn btn-default']) }}
             {{ link_to_route('discounts.index','Back') }}
          </div>
      {{ Form::close() }}
    @else
          <h1>You need to have brands and categories, to create discounts!!</h1>
    @endif
  
@stop
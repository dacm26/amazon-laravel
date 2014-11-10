@extends('layouts.default')

@section('content')
  @if (count($brands) >= 1 and count($categories) >= 1 and !($discount->inactive)) 
      <h1 class="page-header">Edit Discount</h1>
      <br>
      {{ Form::open(array('route' => array('discounts.update', $discount->id),'class'=>'form', 'method' => 'put')) }}
          
           <div class="form-group">
            {{ Form::label('discount','Discount: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::number('discount',$discount->discount,['class' => 'form-control']) }}
            {{ $errors->first('discount') }}
          </div>

          <div class="form-group">
            {{ Form::label('datestart','Datestart: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'datestart', $discount->datestart, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('datestart') }}
          </div>     

          <div class="form-group">
            {{ Form::label('dateend','Dateend: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'dateend', $discount->dateend, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('dateend') }}
          </div>  

          <div class="form-group">
            {{ Form::label('brand_id','Brand: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('brand_id', $brands,$discount->brand_id) }}
            {{ $errors->first('brand_id') }}
          </div>
          
          <div class="form-group">
            {{ Form::label('category_id','Category: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('category_id', $categories,$discount->category_id) }}
            {{ $errors->first('category_id') }}
          </div>
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('discounts.index','Back') }}
          </div>
   
     {{ Form::close() }}
     @else
        @if ($discount->inactive)
          <h1>The discount is inactive!!</h1>
        @endif
        @if (!(count($brands) >= 1 and count($categories) >= 1 ))
          <h1>You need to have brands and categories, to create discounts!!</h1>
        @endif
          
    @endif
@stop
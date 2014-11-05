@extends('layouts.default')

@section('content')

      <h1 class="page-header">Create Category</h1>
      <br>
      {{ Form::open(array('route' => array('categories.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      
          <div class="form-group">
            {{ Form::label('description','Description: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::textarea ('description',"",['class' => 'form-control']) }}
            {{ $errors->first('description') }}
          </div>

      
           <div class="form-group">
            {{ Form::label('code','Code: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('code',"",['class' => 'form-control']) }}
            {{ $errors->first('code') }}
          </div>
            
      
          <div class="form-group">
            {{ Form::label('tax_free','Tax Free: ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::radio('tax_free','1 ',['class' => 'exampleInputEmail1']) }} <label>Yes</label><br>
            {{ Form::radio('tax_free', '0', true,['class' => 'exampleInputEmail1']) }}<label> No</label>
          </div>
      
             <div class="form-group">
            {{ Form::label('attribute_1','Attribute 1 ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::label('attribute_name_1','Name: ',['class' => 'exampleInputEmail1']) }}{{ Form::text('attribute_name_1',"",['class' => 'form-control']) }}
            {{ Form::label('attribute_value_1','Value: ',['class' => 'exampleInputEmail1']) }}{{ Form::text('attribute_value_1',"",['class' => 'form-control']) }}
            {{ $errors->first('attribute_name_1') }}
            {{ $errors->first('attribute_value_1') }}
          </div>
      
      
            <div class="form-group">
            {{ Form::label('attribute_2','Attribute 2 ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::label('attribute_name_2','Name: ',['class' => 'exampleInputEmail1']) }}{{ Form::text('attribute_name_2',"",['class' => 'form-control']) }}
            {{ Form::label('attribute_value_2','Value: ',['class' => 'exampleInputEmail1']) }}{{ Form::text('attribute_value_2',"",['class' => 'form-control']) }}
            {{ $errors->first('attribute_name_2') }}
            {{ $errors->first('attribute_value_2') }}
          </div>
      
            <div class="form-group">
            {{ Form::label('attribute_3','Attribute 3 ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::label('attribute_name_3','Name: ',['class' => 'exampleInputEmail1']) }}{{ Form::text('attribute_name_3',"",['class' => 'form-control']) }}
            {{ Form::label('attribute_value_3','Value: ',['class' => 'exampleInputEmail1']) }}{{ Form::text('attribute_value_3',"",['class' => 'form-control']) }}
            {{ $errors->first('attribute_name_3') }}
            {{ $errors->first('attribute_value_3') }}
          </div>
          
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Category',['class' => 'btn btn-default']) }}
             {{ link_to_route('categories.index','Back') }}
          </div>
      {{ Form::close() }}
@stop
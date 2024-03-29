@extends('layouts.default')

@section('content')
  @if (count($roles) >= 1)
      <h1 class="page-header">Create Employee</h1>
       <br>
      {{ Form::open(array('route' => array('employees.store'),'class'=>'form', 'method' => 'post')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',"",['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
      
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',"",array('placeholder'=>'example@test.com','class' => 'form-control')) }}
            {{ $errors->first('email') }}
          </div>

          <div class="form-group">
            {{ Form::label('birthday','Birthday: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'birthday', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('birthday') }}
                                     @if ($message = Session::get('birthday'))
              {{ $message }}
            @endif
          </div>
      
           <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',"",array('placeholder'=>'3145896','class' => 'form-control')) }}
            {{ $errors->first('mobile') }}
          </div>
      
      
          <div class="form-group">
            {{ Form::label('gender','Gender: ',['class' => 'exampleInputEmail1']) }}<br>
            {{ Form::radio('gender','M',['class' => 'exampleInputEmail1']) }} <label>Male</label><br>
            {{ Form::radio('gender', 'F', true) }}<label> Female</label>
          </div>

          <div class="form-group">
            {{ Form::label('password','Password: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::password('password',['class' => 'form-control']) }}
            {{ $errors->first('password') }}
          </div>

          <div class="form-group">
            {{ Form::label('role_id','Role: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('role_id', $roles) }}
            {{ $errors->first('role_id') }}
          </div>
          
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Create Employee',['class' => 'btn btn-default']) }}
             {{ link_to_route('employees.index','Back') }}
          </div>
      {{ Form::close() }}
      
    @else
          <h1>You need to have roles, to create employees!!</h1>
    @endif
@stop
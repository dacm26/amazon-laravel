@extends('layouts.default')

@section('content')
  @if (count($roles) >= 1 and  (!($employee->inactive)))
      <h1 class="page-header">Edit Employee</h1>
      <br>
      {{ Form::open(array('route' => array('employees.update', $employee->id),'class'=>'form', 'method' => 'put')) }}
          <div class="form-group">
            {{ Form::label('name','Name: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('name',$employee->name,['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>
            
      
          <div class="form-group">
            {{ Form::label('email','Email: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::email('email',$employee->email,['class' => 'form-control']) }}
            {{ $errors->first('email') }}
                        @if ($message = Session::get('email'))
              {{ $message }}
            @endif
          </div>



          <div class="form-group">
            {{ Form::label('birthday','Birthday: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::input('date', 'birthday', $employee->birthday, ['class' => 'form-control', 'placeholder' => 'Date']) }}
            {{ $errors->first('birthday') }}
                                     @if ($message = Session::get('birthday'))
              {{ $message }}
            @endif
          </div>
          
           <div class="form-group">
            {{ Form::label('mobile','Mobile: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::text('mobile',$employee->mobile,['class' => 'form-control']) }}
            {{ $errors->first('mobile') }}
                         @if ($message = Session::get('mobile'))
              {{ $message }}
            @endif
          </div>
          
          @if( ($employee->gender) == 'F')
              <div class="form-group">
                {{ Form::label('gender','Gender: ',['class' => 'exampleInputEmail1']) }}<br>
                {{ Form::radio('gender','M') }} <label>Male</label><br>
                {{ Form::radio('gender', 'F', true) }}<label> Female</label>
              </div>
          @else
              <div class="form-group">
                {{ Form::label('gender','Gender: ',['class' => 'exampleInputEmail1']) }}<br>
                {{ Form::radio('gender','M',true) }} <label>Male</label><br>
                {{ Form::radio('gender', 'F') }}<label> Female</label>
              </div>
          @endif
      
          <div class="form-group">
            {{ Form::label('role_id','Role: ',['class' => 'exampleInputEmail1']) }}
            {{ Form::select('role_id', $roles,$employee->role_id) }}
            {{ $errors->first('role_id') }}
          </div>
          
                
          <div class="container col-sm-4 col-sm-offset-4">
             {{ Form::submit('Save',['class' => 'btn btn-default']) }}
             {{ link_to_route('employees.index','Back') }}
          </div>
      {{ Form::close() }}
    @else
      @if (($employee->inactive))
          <h1>This employee is inactive!!</h1>
      @endif
      @if (count($roles) == 0)
          <h1>You need to have roles, to edit employees!!</h1>
      @endif
    @endif
@stop
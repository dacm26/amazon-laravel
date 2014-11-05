@extends('layouts.default')

@section('content')

    <h1 class="page-header">All Roles</h1>
    <br>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th></th>
                  <th></th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
             @foreach($roles as $role)
        @if (!($role->inactive))
          <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td><button class="btn btn-default">{{ link_to_show_role($role)  }}</button></td>
            <td><button  class="btn btn-default">{{ link_to_edit_role($role)  }}</button></td>
            <td>
              {{ Form::open(array('route' => array('roles.destroy', $role->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
                  {{ Form::close() }}</td>
          </tr>
        @endif
       @endforeach
          </tbody>
        </table>
          </div>
        </div>
      </div> 
@stop
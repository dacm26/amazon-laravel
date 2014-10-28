@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Roles</h2>
    <table class="table table-striped">
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
            <td colspan="2"> {{ link_to_show_role($role)  }} || {{ link_to_edit_role($role)  }}  </td>
            <td>{{ Form::open(array('route' => array('roles.destroy', $role->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>
        @endif
       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_role()  }}</p>
</div>
@stop
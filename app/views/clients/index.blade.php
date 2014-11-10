@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Clients</h2>
    <table class="table table-striped">
       <thead>
           <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th></th>
             <th></th>
             <th></th>
          </tr>
       </thead>
      <tbody>
       @foreach($clients as $client)
          <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->email}}</td>
            <td colspan="2"> {{ link_to_show_client($client)  }} || {{ link_to_edit_client($client)  }}  </td>
            <td>{{ Form::open(array('route' => array('clients.destroy', $client->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>

       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_client()  }}</p>
</div>
@stop
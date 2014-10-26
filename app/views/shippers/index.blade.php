@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Shippers</h2>
    <table class="table table-striped">
       <thead>
           <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Mobile</th>
             <th>Email</th>
             <th>Porcentage</th>
             <th></th>
             <th></th>
             <th></th>
          </tr>
       </thead>
      <tbody>
       @foreach($shippers as $shipper)
          <tr>
            <td>{{$shipper->id}}</td>
            <td>{{$shipper->name}}</td>
            <td>{{$shipper->mobile}}</td>
            <td>{{$shipper->email}}</td>
            <td>{{$shipper->porcentage}}</td>
            <td colspan="2"> {{ link_to_show_shipper($shipper)  }} || {{ link_to_edit_shipper($shipper)  }}  </td>
            <td>{{ Form::open(array('route' => array('shippers.destroy', $shipper->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>

       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_shipper()  }}</p>
</div>
@stop
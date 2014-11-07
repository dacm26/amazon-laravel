@extends('layouts.default')

@section('content')

    <h1 class="page-header">All Customers</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover">
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
       @foreach($customers as $customer)
        @if (!($customer->inactive))
          <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{ link_to_show_customer($customer)  }} </td>
            <td>{{ link_to_edit_customer($customer)  }} </td>
            <td>{{ Form::open(array('route' => array('customers.destroy', $customer->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
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
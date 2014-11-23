@extends('layouts.default')

@section('content')
<h1 class="page-header">All Orders</h1>
    <br>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="container col-sm-12">
              {{ Form::open(array('url' => '/orders/search','class'=>'form')) }}
                  <div class="container col-sm-3">
                        {{ Form::input('date', 'start', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                  </div>
                  <div class="container col-sm-3">
                       {{ Form::input('date', 'end', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                  </div>     
                  <div class="container col-sm-3">
                        {{ Form::text('keyword',null,array('placeholder'=>'Customer','class' => 'form-control')) }}
                  </div>
                  <div class="container col-sm-2">
                        {{ Form::submit('Search',['class' => 'btn btn-info']) }}
                  </div>
              {{ Form::close() }}
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Order Date</th>
                  <th>Customer</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
             @foreach($orders as $order)
          <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{ Customer::findOrFail($order->customer_id)->name }}</td>
            <td>{{ link_to_show_order($order)  }}</td>
          </tr>
       @endforeach
          </tbody>
        </table>
          </div>
        </div>
      </div> 
@stop
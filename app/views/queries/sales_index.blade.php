@extends('layouts.default')

@section('content')
<h1 class="page-header">Sales</h1>
    <br>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="container col-sm-12">
              {{ Form::open(array('url' => '/sales/search','class'=>'form')) }}
                  <div class="container col-sm-4">
                        {{ Form::input('date', 'start', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                  </div>
                  <div class="container col-sm-4">
                       {{ Form::input('date', 'end', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                  </div>     
                  <div class="container col-sm-4">
                        {{ Form::submit('Search',['class' => 'btn btn-info']) }}
                  </div>
              {{ Form::close() }}
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Quantity</th>
                  <th>Total per product</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
             @foreach($orders as $order)
          <tr>
            <td>{{ Product::findOrFail($order->product_id)->name }}</td>
            <td>$ {{ Product::findOrFail($order->product_id)->price }}</td>
            <td>{{$order->quantity}}</td>
            <td>${{ Product::findOrFail($order->product_id)->price*$order->quantity }}  </td>
          </tr>
       @endforeach
            
          </tbody>
        </table>
            <div class="col-md-10 col-md-offset-7">
              <h2>Total: ${{ $total }}</h2>
            </div>
          </div>
        </div>
      </div> 
@stop
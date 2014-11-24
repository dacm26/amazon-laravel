@extends('layouts.default')

@section('content')
<h1 class="page-header">Show Order</h1>
    <br>


            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="col-md-10 col-md-offset-1">
                        <h4>Order ID: <b>{{ $order->id }}</b></h4>
                        <h4>Date: <b>{{ $order->order_date }}</b></h4>
                        <h4>Customer: <b> {{ Customer::findOrFail($order->customer_id)->name }} </b></h4>
                        <h4>Shipper: <b> {{ Shipper::findOrFail($order->shipper_id)->name }} </b></h4>
                        <br><br>
                        <h4>Products in this Order:</h4>
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $detail)
                                        <tr>
                                          <td>{{ Product::findOrFail($detail->product_id)->code }}</td>
                                          <td>{{ Product::findOrFail($detail->product_id)->name }}</td>
                                          <td>{{ Product::findOrFail($detail->product_id)->price }}</td>
                                          <td>{{ $detail->quantity }}</td>
                                          <td>$ {{ Product::findOrFail($detail->product_id)->price*$detail->quantity  }}</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                           </div>
                        </div>
                        <h3 style="text-align:right">Total Sales: <b>$ {{ $total }}</b></h3>
                        <br>
                        <div style="text-align: center;">
                            {{ link_to_route('orders.index','Back') }}
                        </div>
                    </div>







</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop
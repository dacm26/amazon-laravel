@extends('layouts.default')

@section('content')
<h1 class="page-header">All Sales by Categories</h1>
    <br>

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="container col-sm-12">
              {{ Form::open(array('url' => '/pro_cat/search','class'=>'form')) }}
                  <div class="container col-sm-3">
                        {{ Form::input('date', 'start', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                  </div>
                  <div class="container col-sm-3">
                       {{ Form::input('date', 'end', null, ['class' => 'form-control', 'placeholder' => 'Date']) }}
                  </div>     
                  <div class="container col-sm-3">
                        {{ Form::select('category', $categories) }}
                  </div>
                  <div class="container col-sm-2">
                        {{ Form::submit('Search',['class' => 'btn btn-info']) }}
                  </div>
              {{ Form::close() }}
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Quantity</th>
              </tr>
          </thead>
          <tbody>
             @foreach($orders as $order)
          <tr>
            <td>{{ Category::findOrFail($order->category_id)->name }}</td>
            <td>{{ Category::findOrFail($order->category_id)->code }}</td>
            <td>{{$order->quantity}}</td>
          </tr>
       @endforeach
          </tbody>
        </table>
          </div>
        </div>
      @if(  $show  )
        <h3 style="text-align:right">Total Sales: <b>$ {{ $total }}</b></h3>
      @endif
      
      </div> 
@stop
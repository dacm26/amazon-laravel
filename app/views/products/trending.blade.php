@extends('layouts.default')

@section('content')

  @if (count($brands) >= 1 and count($categories) >= 1)
    <h1 class="page-header">Trending Products</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover">
       <thead>
           <tr>
             <th>Name</th>
             <th>Price</th>
             <th>Visits</th>
             <th></th>
             <th></th>
          </tr>
       </thead>
      <tbody>
       @foreach($products as $product)
          <tr>
            <td>{{$product->name}}</td>
            <td>${{$product->price}}</td>
            <td>{{$product->visits}}</td>
            <td>{{ link_to_show_product($product)  }} </td>

          </tr>
       @endforeach
       </tbody>
    </table>
                                  </div>
        </div>
      </div>     
     @else
          <h1>You need to have brands and categories, to view products!!</h1>
    @endif
@stop
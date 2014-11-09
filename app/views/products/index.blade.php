@extends('layouts.default')

@section('content')

  @if (count($brands) >= 1 and count($categories) >= 1)
    <h1 class="page-header">All Products</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
                        <div class="container col-sm-10">
              {{ Form::open(array('url' => '/products/search','class'=>'form')) }}
                  <div class="container col-sm-7">
                        {{ Form::text('keyword',null,array('placeholder'=>'Search','class' => 'form-control')) }}
                  </div>
                  <div class="container col-sm-3">
                        {{ Form::submit('Search',['class' => 'btn btn-info']) }}
                  </div>
              {{ Form::close() }}
            </div>
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
       @foreach($products as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{ link_to_show_product($product)  }} </td>
            <td>{{ link_to_edit_product($product)  }}</td>
            <td>{{ Form::open(array('route' => array('products.destroy', $product->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>
       @endforeach
       </tbody>
    </table>
                                  </div>
        </div>
      </div>     
     @else
          <h1>You need to have brands and categories, to create products!!</h1>
    @endif
@stop
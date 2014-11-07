@extends('layouts.default')

@section('content')

  @if (count($brands) >= 1 and count($categories) >= 1)
    <h1 class="page-header">All Products</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
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
        @if (!($product->inactive))
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{ link_to_show_product($product)  }} </td>
            <td>{{ link_to_edit_product($product)  }}</td>
            <td>{{ Form::open(array('route' => array('products.destroy', $product->id), 'method' => 'delete')) }}
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
     @else
          <h1>You need to have brands and categories, to create products!!</h1>
    @endif
@stop
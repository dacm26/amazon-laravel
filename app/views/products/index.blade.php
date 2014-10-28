@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Products</h2>
    <table class="table table-striped">
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
            <td colspan="2"> {{ link_to_show_product($product)  }} || {{ link_to_edit_product($product)  }}  </td>
            <td>{{ Form::open(array('route' => array('products.destroy', $product->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>

       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_product()  }}</p>
</div>
@stop
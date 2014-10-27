@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Brands</h2>
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
       @foreach($brands as $brand)
          <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td colspan="2"> {{ link_to_show_brand($brand)  }} || {{ link_to_edit_brand($brand)  }}  </td>
            <td>{{ Form::open(array('route' => array('brands.destroy', $brand->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>

       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_brand()  }}</p>
</div>
@stop
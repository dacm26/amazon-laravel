@extends('layouts.default')

@section('content')

    <h1 class="page-header">All Brands</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="container col-sm-10">
              {{ Form::open(array('url' => '/brands/search','class'=>'form')) }}
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
       @foreach($brands as $brand)
          <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
             <td>{{ link_to_show_brand($brand)  }}</td>
            <td>{{ link_to_edit_brand($brand)  }}</td>
            <td>{{ Form::open(array('route' => array('brands.destroy', $brand->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>
       @endforeach
       </tbody>
    </table>
                      </div>
        </div>
      </div> 
@stop
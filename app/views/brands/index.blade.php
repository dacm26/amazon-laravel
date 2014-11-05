@extends('layouts.default')

@section('content')

    <h1 class="page-header">All Brands</h1>
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
       @foreach($brands as $brand)
        @if (!($brand->inactive))
          <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
             <td><button class="btn btn-default">{{ link_to_show_brand($brand)  }}</button></td>
            <td><button  class="btn btn-default">{{ link_to_edit_brand($brand)  }}</button></td>
            <td>{{ Form::open(array('route' => array('brands.destroy', $brand->id), 'method' => 'delete')) }}
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
@stop
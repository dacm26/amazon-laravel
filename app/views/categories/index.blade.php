@extends('layouts.default')

@section('content')

    <h1 class="page-header">All Categories</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-hover">
       <thead>
           <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Code</th>
             <th></th>
             <th></th>
             <th></th>
          </tr>
       </thead>
      <tbody>
       @foreach($categories as $category)
         @if (!($category->inactive))
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->code}}</td>
            <td><button class="btn btn-default">{{ link_to_show_category($category)  }} </button></td>
            <td><button  class="btn btn-default">{{ link_to_edit_category($category)  }}</button></td>
            <td>{{ Form::open(array('route' => array('categories.destroy', $category->id), 'method' => 'delete')) }}
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
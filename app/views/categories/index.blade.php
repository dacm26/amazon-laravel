@extends('layouts.default')

@section('content')

  <div class= "container col-md-4 col-md-offset-4">
    <h2>All Categories</h2>
    <table class="table table-striped">
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
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->code}}</td>
            <td colspan="2"> {{ link_to_show_category($category)  }} || {{ link_to_edit_category($category)  }}  </td>
            <td>{{ Form::open(array('route' => array('categories.destroy', $category->id), 'method' => 'delete')) }}
                      {{ Form::submit('Delete',['class' => 'btn btn-danger btn-mini']) }}
                  {{ Form::close() }}</td>
          </tr>

       @endforeach
       </tbody>
    </table>
    <p>{{ link_to_create_category()  }}</p>
</div>
@stop
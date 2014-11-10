@extends('layouts.default')

@section('content')

  @if (count($brands) >= 1 and count($categories) >= 1)
    <h1 class="page-header">All Discounts</h1>
    <br>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-body">
                        <div class="container col-sm-10">
              {{ Form::open(array('url' => '/discounts/search','class'=>'form')) }}
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
             <th>Discount</th>
             <th>Created_at</th>
             <th>updated_at</th>
             <th>Updated_by</th>
             
             <th></th>
             <th></th>
             <th></th>
          </tr>
       </thead>
      <tbody>
       @foreach($discounts as $discount)
          <tr>
            <td>{{$discount->id}}</td>
            <td>{{$discount->discount}}</td>
            <td>{{$discount->created_at}}</td>
            <td>{{$discount->updated_at}}</td>
            <td>{{$discount->updated_by}}</td>
            
            <td>{{ link_to_show_discount($discount)  }} </td>
            <td>{{ link_to_edit_discount($discount)  }}</td>
            <td>{{ Form::open(array('route' => array('discounts.destroy', $discount->id), 'method' => 'delete')) }}
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
          <h1>You need to have brands and categories, to create discounts!!</h1>
    @endif
@stop
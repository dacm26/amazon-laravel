@extends('layouts.main')

@section('content')
  <!--HEADER ROW-->
  <div id="header-row">
    <div class="container">
      <div class="row">
              <!--LOGO-->
              <div class="span3"><a class="brand" href="#"><img src="{{ URL::asset('main/img/logo.png') }}"/></a></div>
              <!-- /LOGO -->

            <!-- MAIN NAVIGATION -->
            <br>
              <div class="span9">
                <div class="navbar  pull-right">
                  <div class="navbar-inner">
                    <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>

                      <ul class="nav">
                        <li>
                            {{ Form::open(array('route' => array('home.search'),'class'=>'navbar-form navbar-left', 'method' => 'get')) }}
                              <div class="form-group">
                                 {{ Form::text('keyword',null,array('placeholder'=>'Search','class' => 'form-control')) }}
                                <div class="form-group">
                                  {{ Form::select('category', $categories) }}
                                  {{ $errors->first('category') }}
                                </div>
                                
                                {{ Form::submit('Search',['class' => 'btn btn-default']) }}
                              </div>
                          {{ Form::close() }}
                        </li>
                        <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li><a href="#">My WishList</a></li>
                        <li><a href="{{ URL::to('signout') }}">{{Auth::customer()->user()->name }}, Not You? Sign Out</a></li>
                      </ul>
                  </div>
                </div>
              </div>
            <!-- MAIN NAVIGATION -->  
      </div>
    </div>
  </div>
  <!-- /HEADER ROW -->
    <br>
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="page-header">
            <h1>Search Result For: "{{ $keyword }}"</h1>
          </div>
        </div>
      </div>
      <br><br>

      <div class="row">
        @foreach($products as $product)
              <div class="span6">
                <div class="media">
                 <a href="#" class="pull-left"><img src="{{ URL::asset('main/img/pic.png') }}" class="media-object" alt='' /></a>
                 <div class="media-body">
                  <h3 class="media-heading">
                    <b>{{ $product->name}}</b>
                  </h3> 
                  <h4>Price: <b>${{ $product->price }}</b></h4>
                  <h4>Units in Stock: <b>{{ $product->units_in_stock }}</b></h4>
                  {{ link_to_product($product) }}
                </div>
              </div>
            </div>
        @endforeach

 
      
  </div>
  </div>
@stop
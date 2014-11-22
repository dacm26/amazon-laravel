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
                        <li><a href="{{ URL::to('wishlist')}}">My WishList</a></li>
                        <li><a href="{{ URL::to('cart')}}">My Shopping Cart</a></li>
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


  <div class="container">
    <div class="span12 cnt-title">
      <h1>{{ $product->name}}</h1>
    </div>
    <img src="{{ URL::asset('main/img/sony.JPG') }}" class="img-thumbnail"/>
    <div id="info" style="position: relative;left: 500px;top: -450px;background-color:#ececec;width:50%;border-radius:25px;padding: 10px 10px 10px 10px;">
      <h3>Brand: <b>{{ $brand->name}}</b></h3>
      <h3>Code: <b>{{ $product->code}}</b></h3>
      <h3>Category: <b>{{ $category->name}}</b></h3>
      <h3>Units in Stock: <b>{{ $product->units_in_stock}}</b></h3>
      <h3>Price: <b><span style="font-size:30px;">${{ $product->price }}</span></b></h3>
      <br>
       @if($check2)
              <div style="text-align:center;">
                   {{ Form::open(array('route' => array('home.remove_cart_item', $product->id),'class'=>'navbar-form navbar-left', 'method' => 'delete')) }}
                        {{ Form::submit('Remove from Cart',['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
      @else
            <div style="text-align:center;">
        {{ Form::open(array('route' => array('home.add_to_cart', $product->id),'class'=>'navbar-form navbar-left', 'method' => 'post')) }}
                    <h3>Quantity: <b>{{ Form::number('quantity', '1',array('min'=>'1','id'=>'UnitsInStock','step'=>'1')) }}</b></h3>

              {{ Form::submit('Add To Cart',['class' => 'btn btn-success']) }}
        {{ Form::close() }}
      </div>
      @endif
      @if($check)
              <div style="text-align:center;">
                   {{ Form::open(array('route' => array('home.remove_wishlist_item', $product->id),'class'=>'navbar-form navbar-left', 'method' => 'delete')) }}
                        {{ Form::submit('Remove from Wishlist',['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </div>
      @else
            <div style="text-align:center;">
        {{ Form::open(array('route' => array('home.add_to_wishlist', $product->id),'class'=>'navbar-form navbar-left', 'method' => 'post')) }}
              {{ Form::submit('Add To WishList',['class' => 'btn btn-success']) }}
        {{ Form::close() }}
      </div>
      @endif

    </div>
  </div>

@stop
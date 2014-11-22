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
<br>
  <div class="container">
    <br>
    {{ Form::open(array('route' => array('home.store_order'),'class'=>'navbar-form navbar-left', 'method' => 'post')) }}
    <div class="row">
      <div class="span12 cnt-title">
        <h1>Order Summary</h1><br>
      </div>
    </div>
    <div style="width:400px; margin: 0 auto;">
      <div class="row">
        <div class="span2">
          <p>Items:</p>
        </div>
        <div class="span2" style="text-align:right;">
          <p id="items">${{ number_format($sub_total,2) }}</p>
        </div>
      </div>  
      <div class="row">
        <div class="span2">
          <p>Shipping:</p>
        </div>
        <div class="span2" style="text-align:right;">
          <p id="shipping">${{ number_format($shipping,2) }}</p>
          {{ Form::hidden ('shipper',$shipper->id) }}
        </div>
      </div>
      <div class="row">
        <div class="span2">
          <p>Discount:</p>
        </div>
        <div class="span2" style="text-align:right;">
          <p id="discount">${{ number_format($total_discount,2) }}</p>
        </div>
      </div>
      <HR width=95%>
      <div class="row">
        <div class="span2">
          <p>Total Before Taxes:</p>
        </div>
        <div class="span2" style="text-align:right;">
          <p id="totalBefore">${{ number_format($total,2) }}</p>
        </div>
      </div>
      <div class="row">
        <div class="span2">
          <p>Estimated Taxes:</p>
        </div>
        <div class="span2" style="text-align:right;">
          <p id="taxes">$ {{ number_format($tax,2) }}</p>
        </div>
      </div>
      <HR width=95%>
      <div class="row">
        <div class="span2">
          <h3>Total:</h3>
        </div>
        <div class="span2" style="text-align:right;">
          <h3 id="total"><b>${{ number_format($total+$tax,2)}}</b></h3>
           {{ Form::hidden ('total',number_format($total+$tax,2)) }}
        </div>
      </div>
      <br>
      <div style="text-align: center;">
                        {{ Form::submit('Order',['class' => 'btn btn-success']) }}
                   {{ Form::close() }}
      </div>
      <br>
    </div>
  </div>




@stop
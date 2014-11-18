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

  <!--Carousel
  ==================================================-->

  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
      <div class="active item">
        <div class="container">
          <div class="row">
              <div class="span6">
                <div class="carousel-caption">
                      <h1>Sign Up Today!</h1>
                      <p class="lead">Sign up today and get special discounts on all our products.<br>Do not wait more.</p>
                      <a class="btn btn-large btn-primary" href="#">Sign up today</a>
                </div>
              </div>
              <div class="span6"> <img src="{{ URL::asset('main/img/slide/iMac.png') }}"></div>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="container">
          <div class="row">
              <div class="span6">
                <div class="carousel-caption">
                      <h1>iPhone 5s</h1>
                      <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <a class="btn btn-large btn-primary" href="#">See More Information</a>
                </div>
              </div>
              <div class="span6"> <img src="{{ URL::asset('main/img/slide/slide2.jpg') }}"></div>
          </div>
        </div>
      </div>

    </div>
       <!-- Carousel nav -->
      <a class="carousel-control left " href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="icon-chevron-right"></i></a>
        <!-- /.Carousel nav -->
  </div>
    <!-- /Carousel -->



<!-- Feature 
  ==============================================-->


  <div class="row feature-box">
      <div class="span12 cnt-title">
       <h1>Most Popular Products</h1> 
        <span>These are our most popular products, enjoy it!</span>        
      </div>

      <div class="span4">
        <a href="#" class="thumbnail">
          <img src="{{ URL::asset('main/img/1.jpg') }}">
        </a>
        <h2>Product Name</h2>
        <p>
            Product Description <br> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
        </p>
        <a href="#">More Information &rarr;</a>
      </div>

      <div class="span4">
        <a href="#" class="thumbnail">
          <img src="{{ URL::asset('main/img/2.jpg') }}">
        </a>
        <h2>Product Name</h2>
        <p>
            Product Description <br> Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
            aliqua. 
        </p>   
          <a href="#">More Information &rarr;</a>    
      </div>

      <div class="span4">
        <a href="#" class="thumbnail">
          <img src="{{ URL::asset('main/img/3.jpg') }}">
        </a>
        <h2>Product Name</h2>
        <p>
            Product Description <br> Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. 
        </p>
          <a href="#">More Information &rarr;</a>
      </div>
  </div>

@stop



  





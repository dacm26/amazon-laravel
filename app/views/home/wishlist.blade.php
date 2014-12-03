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
    <div class="row">
      <div class="span12 cnt-title">
        <h1>My Wish List</h1>
      </div>
    </div>
    <br><br>

  
      
<div class="row">
        @foreach($products as $product)
                    <div class="span6">
        <div class="media">
         <a href="#" class="pull-left"><img src="{{ $product->image_url }}" class="media-object" alt='' height="140" width="140" /></a>
         <div class="media-body">
          <h3 class="media-heading">
            <b>{{ $product->name}}</b>
          </h3> 
          <h4>Price: <b>${{ $product->price }}</b></h4>
           {{ link_to_product($product) }}
           
                   {{ Form::open(array('route' => array('home.remove_wishlist_item', $product->id),'class'=>'navbar-form navbar-left', 'method' => 'delete')) }}
                        {{ Form::submit('Remove',['class' => 'btn btn-danger']) }}
                   {{ Form::close() }}
        </div>
      </div>
    </div> 
        
  
        @endforeach

 
      
  </div>
    
</div>
</div>
@stop
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Amazom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('main/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('main/css/bootstrap-responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('main/css/style.css') }}" rel="stylesheet"> 
    
    <!--Font-->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css'>
    
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
      
      <!-- Fav and touch icons -->
      <link rel="shortcut icon" href="{{ URL::asset('main/ico/favicon.ico') }}">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('main/ico/apple-touch-icon-144-precomposed.png') }}">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('main/ico/apple-touch-icon-114-precomposed.png') }}">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('main/ico/apple-touch-icon-72-precomposed.png') }}">
      <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('main/ico/apple-touch-icon-57-precomposed.png') }}">


      

    <!-- SCRIPT 
    ============================================================-->  
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{ URL::asset('main/js/bootstrap.min.js') }}"></script>
      
      
  </head>
  <body>
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
                          <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Search Product">
                              <select>
                                <option value="0">All Categories</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                              </select>
                              <button type="submit" class="btn btn-default">Search</button>
                            </div>
                          </form>
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


<!--Footer
==========================-->

<footer>
    <div class="container">
      <div class="row">
        <div class="span6">Copyright &copy 2014 Amazon | All Rights Reserved  <br>
        <small>Análisis y Diseño de Sistemas II - Unitec.</small>
        </div>
        <div class="span6">
            <div class="social pull-right">
                <a href="#"><img src="{{ URL::asset('main/img/social/googleplus.png') }}" alt=""></a>
                <a href="#"><img src="{{ URL::asset('main/img/social/dribbble.png') }}" alt=""></a>
                <a href="#"><img src="{{ URL::asset('main/img/social/twitter.png') }}" alt=""></a>
                <a href="#"><img src="{{ URL::asset('main/img/social/dribbble.png') }}" alt=""></a>
                <a href="#"><img src="{{ URL::asset('main/img/social/rss.png') }}" alt=""></a>
            </div>
        </div>
      </div>
    </div>
</footer>

<!--/.Footer-->

  </body>
</html>
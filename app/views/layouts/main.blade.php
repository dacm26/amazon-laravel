<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Amazon</title>
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



      @yield('content')


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
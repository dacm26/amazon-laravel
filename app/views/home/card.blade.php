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
        <script type="text/javascript">
    function soloLetras(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-39-46";
        tecla_especial = false
        for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
            break;
          }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
        }
    }
    function soloNumeros(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " 0123456789";
        especiales = "8-37-39-46";
        tecla_especial = false
        for(var i in especiales){
          if(key == especiales[i]){
            tecla_especial = true;
            break;
          }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
        }
      }
    $( document ).ready(function() {
      function checkLuhn(input) {
        var sum = 0;
        var numdigits = input.length;
        var parity = numdigits % 2;
        for(var i=0; i < numdigits; i++) {
          var digit = parseInt(input.charAt(i))
          if(i % 2 == parity) digit *= 2;
          if(digit > 9) digit -= 9;
          sum += digit;
        }
        return (sum % 10) == 0;
      };
      function detectCard(input) {
        var typeTest = 'u',
        ltest1 = 16,
        ltest2 = 16;
        if(/^4/.test(input)){
          typeTest = 'v';
          ltest1 = 13;
        } else if (/^5[1-5]/.test(input)){
          typeTest = 'm';
        } else if (/^3[4-7]/.test(input)){
          typeTest = 'a';
          ltest1 = 15;
          ltest2 = 15;
        } else if(/^6(011|4[4-9]|5)/.test(input)){
          typeTest = 'd';
        }
        return [typeTest,ltest1,ltest2];
      }

      
      $('input.cc').keyup(function(){
        var val = this.value,
        val = val.replace(/[^0-9]/g, ''),
        detected = detectCard(val),
        errorClass = '',
        luhnCheck = checkLuhn(val),
        valueCheck = (val.length == detected[1] || val.length == detected[2]);
        console.log(valueCheck);
        if(luhnCheck && valueCheck) {
          errorClass = 'verified';
        } else if(valueCheck || val.length > detected[2]) {
          errorClass = 'error';
        }

        $(this).attr('class', 'cc ' + detected[0] + ' ' + errorClass);
      });
    });
</script>    
        
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
      
      <style>
    .cc{
  background: url('http://jbuc.com/look/here/cards.png') 4px 4px no-repeat;
  font-size:2em; 
  padding:.3em;
  padding-left:3em;
  margin:-1em auto 0;
  position:relative; 
  top:50%; 
  display:block;
  border-radius:.2em;border:1px solid #ddd;
  box-shadow:.05em .05em .1em rgba(50,50,50,.08) inset;
  outline:none;
  transition:border 500ms;
  transition:box-shadow 500ms;
  transition:color 500ms;
  transition:background-color 500ms;
  width:11.15em;
  position:relative;
}
.cc:focus {
  box-shadow:.05em .05em .25em rgba(50,50,50,.25) inset;
  border:1px solid #ccc;
}
.cc.error {
  border-color: rgb(255, 100, 100);
  box-shadow: .05em .05em .25em rgba(170, 117, 117, .5) inset;
  background-color: rgba(255, 100, 100, .08);
  color: rgb(90, 0, 0);
}
.cc.verified {
  border-color:rgb(152, 199, 152);
  box-shadow:.05em .05em .25em rgba(0,50,0,.3) inset;
}

.cc.a {background-position:4px -96px;}
.cc.d {background-position:4px -196px;}
.cc.m {background-position:4px -296px;}
.cc.v {background-position:4px -396px;}
  </style>

  <br>
  <div class="container">
    <br>
    <div class="row">
      <div class="span12 cnt-title">
        <h1>My Credit Card</h1><br>
        <img src="{{ URL::asset('main/img/creditCard.png') }}"/>
      </div>
    </div>
            <div style="width:400px; margin: 0 auto; text-align: center;">
        {{ Form::open(array('route' => array('home.store_card'), 'method' => 'post')) }}

             <div class="form-item">
                <p class="formLabel">Name (as it appears on your card):</p><br>
                {{ Form::text('name',"",array('style'=>'width:300px;','class' => 'form-control','onkeypress'=>'return soloLetras(event)')) }}
                {{ $errors->first('name') }}
             </div>
             <div class="form-item">
                <p class="formLabel">Card Number:</p><br>
                {{ Form::text('number',"",array('style' => 'position:relative; height:50px; width:300px; text-align:right; font-size:18px;','class'=>'cc','placeholder'=>'XXXXXXXXXXXXXXXX','onkeypress'=>'return soloNumeros(event)')) }}
                {{ $errors->first('number') }}
             </div>
             <div class="form-item">
                <p class="formLabel">Expiration Date:</p>
                {{ Form::selectMonth('month',array('style' => 'width:180px;')) }}
                {{ Form::select('year',array('2015' => '2015', 
                                             '2016' => '2016',
                                             '2017' => '2017',
                                             '2018' => '2018',
                                             '2019' => '2019',), '2015') }}
             </div> 
             <div class="form-item">
                <p class="formLabel">Security Code (Back): </p><br>
                {{ Form::text('code',"",array('style'=>'width:80px;','class' => 'form-control','placeholder' => '123','onkeypress'=>'return soloNumeros(event)')) }}
                {{ $errors->first('code') }}
             </div>  <br><br>
            
             <div class="form-item">
               {{ Form::submit('Continue', array('class'=>'btn btn-success')) }}
               <div class="clear-fix"></div>
             </div>
        
        {{ Form::close() }}
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
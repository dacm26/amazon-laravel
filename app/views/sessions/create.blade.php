<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <script src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <style type="text/css">
    body {
      font-family:'HelveticaNeue','Arial', sans-serif;
      background: -webkit-linear-gradient(45deg, #399E98 25%, #3aa19b 25%, #3aa19b 50%, #399E98 50%, #399E98 75%, #3aa19b 75%, #3aa19b);
      background: -moz-linear-gradient(45deg, #399E98 25%, #3aa19b 25%, #3aa19b 50%, #399E98 50%, #399E98 75%, #3aa19b 75%, #3aa19b);
      background: -o-linear-gradient(45deg, #399E98 25%, #3aa19b 25%, #3aa19b 50%, #399E98 50%, #399E98 75%, #3aa19b 75%, #3aa19b);
      background: linear-gradient(45deg, #399E98 25%, #3aa19b 25%, #3aa19b 50%, #399E98 50%, #399E98 75%, #3aa19b 75%, #3aa19b);
      background-size:100px 100px;
    }
    a{color:#58bff6;text-decoration: none;}
    a:hover{color:#aaa; }
    .pull-right{float: right;}
    .pull-left{float: left;}
    .clear-fix{clear:both;}
    div.logo{text-align: center; margin: 20px 20px 30px 20px; fill: #566375;}
    div.logo svg{
      width:180px;
      height:100px;
    }
    #formWrapper{
      background: rgba(0,0,0,.2); 
      width:100%; 
      height:100%; 
      position: absolute; 
      top:0; 
      left:0;
      transition:all .3s ease;
    }
    .darken-bg{background: rgba(0,0,0,.5) !important; transition:all .3s ease;}
    div#form{
      position: absolute;
      width:360px;
      height:320px;
      height:auto;
      background-color: #fff;
      margin:auto;
      border-radius: 5px;
      padding:20px;
      left:50%;
      top:50%;
      margin-left:-180px;
      margin-top:-200px;
    }
    div.form-item{position: relative; display: block; margin-bottom: 20px;}
    input{transition: all .2s ease;}
    input.form-style{
      color:#8a8a8a;
      display: block;
      width: 90%;
      height: 44px;
      padding: 5px 5%;
      border:1px solid #ccc;
      -moz-border-radius: 27px;
      -webkit-border-radius: 27px;
      border-radius: 27px;
      -moz-background-clip: padding;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      background-color: #fff;
      font-family:'HelveticaNeue','Arial', sans-serif;
      font-size: 105%;
      letter-spacing: .8px;
    }
    div.form-item .form-style:focus{outline: none; border:1px solid #58bff6; color:#58bff6; }
    div.form-item p.formLabel {
      position: absolute;
      left:26px;
      top:2px;
      transition:all .4s ease;
      color:#bbb;
    }
    .formTop{top:-22px !important; left:26px; background-color: #fff; padding:0 5px; font-size: 14px; color:#58bff6 !important;}
    .formStatus{color:#8a8a8a !important;}
    input[type="submit"].login{
      float:right;
      width: 112px;
      height: 37px;
      -moz-border-radius: 19px;
      -webkit-border-radius: 19px;
      border-radius: 19px;
      -moz-background-clip: padding;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      background-color: #55b1df;
      border:1px solid #55b1df;
      border:none;
      color: #fff;
      font-weight: bold;
    }
    input[type="submit"].login:hover{background-color: #fff; border:1px solid #55b1df; color:#55b1df; cursor:pointer;}
    input[type="submit"].login:focus{outline: none;}
    @mixin center(){
      -webkit-transform: translate(-50%,-50%);
      -ms-transform: translate(-50%,-50%);
      transform: translate(-50%,-50%);
      left:50%;
      top:50%;
    }
    .title{
      font-weight: 500;
      color: transparent;
      font-size:100px;
      background: url("http://phandroid.s3.amazonaws.com/wp-content/uploads/2014/05/rainbow-nebula.jpg") repeat;
      background-position: 40% 50%;
      -webkit-background-clip: text;
      position:relative;
      text-align:center;
      line-height:90px;
      letter-spacing: -8px;
    }
    .subtitle{
      display: block;
      text-align: center;
      text-transform: uppercase;
      padding-top:10px;
    }
  </style>
  <script>
  $(document).ready(function(){
    var formInputs = $('input[type="email"],input[type="password"]');
    formInputs.focus(function() {
     $(this).parent().children('p.formLabel').addClass('formTop');
     $('div#formWrapper').addClass('darken-bg');
     $('div.logo').addClass('logo-active');
   });
    formInputs.focusout(function() {
      if ($.trim($(this).val()).length == 0){
        $(this).parent().children('p.formLabel').removeClass('formTop');
      }
      $('div#formWrapper').removeClass('darken-bg');
      $('div.logo').removeClass('logo-active');
    });
    $('p.formLabel').click(function(){
     $(this).parent().children('.form-style').focus();
   });
  });
  var mouseX, mouseY;
  var ww = $( window ).width();
  var wh = $( window ).height();
  var traX, traY;
  $(document).mousemove(function(e){
    mouseX = e.pageX;
    mouseY = e.pageY;
    traX = ((4 * mouseX) / 570) + 40;
    traY = ((4 * mouseY) / 570) + 50;
    console.log(traX);
    $(".title").css({"background-position": traX + "%" + traY + "%"});
  });

  function formulario(f) { 
    alert ('Entro')
    if (f.email.value == '') { alert ('Please Enter Email');  
    f.email.focus(); return false; } 
    if (f.password.value == '') { alert ('Please Enter Password'); 
    f.password.focus(); return false; } return true; } 

        function validarCamposNoVacios() {
      if (document.getElementById("email").value == ""){
          alert ("Please Enter your email!");
          $("#email").focus();
          return;
      }
      if (document.getElementById("password").value == ""){
          alert ("Please Enter your password!");
          $("#password").focus();
          return;
      }
    }   

    </script>
  </head>
  <body>
    <div id="formWrapper">
      <div id="form">
        {{ Form::open(array('route' => array('sessions.store'), 'method' => 'post')) }}
              <div class="logo">
                <div class="container">
                  <div class="title">Amazon</div>
                  <div class="subtitle"> User Login </div>
                </div>
              </div>

             <div class="form-item">
                <p class="formLabel">Email</p>
                {{ Form::email('email',"",array('class' => 'form-style','id'=>'email','name'=>'email')) }}
                {{ $errors->first('email') }}
             </div>
             <div class="form-item">
                <p class="formLabel">Password</p>
                {{ Form::password('password',array('class' => 'form-style','id'=>'password','name'=>'password')) }}
                {{ $errors->first('password') }}
             </div>
              

             <div class="form-item">
               <p class="pull-left"><a href="#"><small>Register</small></a></p>
               {{ Form::submit('Login', array('class'=>'login pull-right','onclick'=>'return validarCamposNoVacios()')) }}
               <div class="clear-fix"></div>
             </div>
        
        {{ Form::close() }}
    </div>
  </div>
</body>
</html>
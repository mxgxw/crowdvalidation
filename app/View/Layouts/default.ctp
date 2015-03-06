<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
	    <?php echo $this->Html->charset(); ?>
    <title>
	    Contemos Nosotros Web App para validar actas de votacion
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
	    echo $this->Html->meta('icon');

	    //echo $this->Html->css('cake.generic');

	    echo $this->fetch('meta');
	    echo $this->fetch('css');
	    echo $this->fetch('script');
    ?>
    <!-- Bootstrap 
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">-->
    <link href="http://contemosnosotros.org/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://contemosnosotros.org/dist/css/ripples.min.css" rel="stylesheet">
    <link href="http://contemosnosotros.org/dist/css/material-wfont.min.css" rel="stylesheet">
    <link href="http://contemosnosotros.org/dist/css/snackbar.min.css" rel="stylesheet">
    <link href="http://contemosnosotros.org/dist/css/custom.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body><!-- navegacion   -->
     <div id="main-header"><div class="navbar navbar-default">
     <div class="container">
    
    		<div class="row">
                <div class="col-lg-12">
                <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">Elecciones 2015</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
    
   
        <ul class="nav navbar-nav">
            <li class="active"><a href="http://contemosnosotros.org/pages/acercade">Acerca de</a></li>
            <li><a href="http://contemosnosotros.org/pages/agradecimientos">Agradecimientos</a></li>
            <li><a href="http://contemosnosotros.org/pages/faq">FAQ</a></li>
            <li class="dropdown">
                <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Resultados <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://contemosnosotros.org/pages/alcaldes">Alcaldes</a></li>
                    <li><a href="http://contemosnosotros.org/pages/diputados">Diputados</a></li>
                    <li><a href="http://contemosnosotros.org/pages/parlacen">Parlacen</a></li>
                   
                </ul>
            </li>
        </ul>
        <!--<form class="navbar-form navbar-left">
            <input type="text" class="form-control col-lg-8" placeholder="Search">
        </form>-->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0)">Link</a></li>
            <li class="dropdown">
                <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)">Action</a></li>
                    <li><a href="javascript:void(0)">Another action</a></li>
                    <li><a href="javascript:void(0)">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)">Separated link</a></li>
                </ul>
            </li>
        </ul></div></div></div>
    </div>
  </div></div><!-- finaliza navegacion   -->
  
  
  
  
      
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
      
    
    
    
    
    <footer>
    <div class="container">
    		<div class="row">
                <div class="col-lg-12">
    	<ul class="">
                  <li class="inicio"><a href="http://contemosnosotros.org/">Inicio</a></li>
                  <li class="resultados"><a href="http://contemosnosotros.org/pages/resultados">Resultados</a></li>
                  <li class="faq"><a href="http://contemosnosotros.org/pages/faq">FAQ</a></li>
                  <li class="acercade"><a href="http://contemosnosotros.org/pages/acercade">Acerca de Nosotros</a></li>
                  <li class="acercade"><a href="http://contemosnosotros.org/pages/agradecimientos">Agradecimientos</a></li>
                </ul> 
       <ul class="">
                  <li><a href="https://github.com/mxgxw/crowdvalidation" target="_blank"><img alt="github" src="/img/github.png"> Crowdvalidation</a></li>
                  <li><a href="https://gist.github.com/hkadejo/9522141" target="_blank"><img alt="github" src="/img/github.png"> Corte de Actas</a></li>
                  <li><a href="http://contemosnosotros.org/app/webroot/sqldumps/" target="_blank"><img alt="filedir" src="/img/github.png"> Base de datos (DUMP SQL)</a></li>
                </ul> 
                </div></div></div>
    </footer>
    
    
     <!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5321ea53081e0c25"></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'transparent',
    'share' : {
      'position' : 'left',
      'numPreferredServices' : 5
    }   
  });
</script>
<!-- AddThis Smart Layers END -->
    
    
    
   <!-- mario revisate estos scripts porfavor    -->
<script type="text/javascript">
var token = 0;
function loadNew() {
  $.ajax({
    url: "./valida/",
  }).done(function( data ) {
    token = data.token;
    $('#imgContainer').html('<img src="./valida/image/'+token+'"/>');
    $('#txtCounter').val("");
  })
}
function sendResult() {
    if(token!=0) {
      $.ajax({
        url: "./valida/conteo/",
        type: 'POST',
        data: { token: token, value: $('#txtCounter').val() }
      }).done(function( data ) {
        if(data.Status) {
          $("#alert-box").show()
          window.setTimeout(function () {
            $("#alert-box").hide();
          }, 3000);
          $('#txtCounter').val("");
          loadNew();
        }
        if(data.Error) {
          window.alert("Error: "+data.Error);
        }
        $("#btnSend").removeAttr("disabled");
        $("#btnSend").text("Enviar Acta")
      })
    }
}
$(function () {
  $("#alert-close-btn").on("click", function(){
    $("#alert-box").hide();
  });
  $('#btnSend').click(function () {
    $("#btnSend").attr("disabled", "disabled");
    $("#btnSend").text("Enviando Acta....")
    counter = $("#txtCounter").val();
    if(counter.indexOf("-")>=0 || counter.indexOf("_")>=0){
      window.alert("No ingrese guiones");
      $("#btnSend").removeAttr("disabled");
      $("#btnSend").text("Enviar Acta");
      return
    }
    sendResult();imgContainer
  });
  $(document).keypress(function(e) {
    if(e.which == 13) {
      sendResult();
    }
  });
  loadNew();
});
</script>
	<?php echo $this->element('sql_dump'); ?>
	
	<!-- scripts revision    -->
	
	
	
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://contemosnosotros.org/dist/js/bootstrap.min.js"></script>
    	<script src="http://contemosnosotros.org/dist/js/ripples.min.js"></script>
        <script src="http://contemosnosotros.org/dist/js/material.min.js"></script>
        <script src="http://contemosnosotros.org/dist/js/snackbar.min.js"></script>


        <script src="http://contemosnosotros.org/dist/js/jquery.nouislider.min.js"></script>
        <script>
            $(function() {
                $.material.init();
                $(".shor").noUiSlider({
                    start: 40,
                    connect: "lower",
                    range: {
                        min: 0,
                        max: 100
                    }
                });

                $(".svert").noUiSlider({
                    orientation: "vertical",
                    start: 40,
                    connect: "lower",
                    range: {
                        min: 0,
                        max: 100
                    }
                });
            });
        </script>
        
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60440558-1', 'auto');
  ga('send', 'pageview');

</script>
  </body>
  
</html>

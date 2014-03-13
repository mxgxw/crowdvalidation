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
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  <body>
      <div class="row">
        <nav class="navbar navbar-inverse" role="navigation">
          <div class="container">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://contemosnosotros.org/">Elecciones 2014</a>
              </div>

              <div class="collapse navbar-collapse  pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="http://contemosnosotros.org/">Inicio</a></li>
                  <li><a href="http://contemosnosotros.org/pages/resultados">Resultados</a></li>
                  <li><a href="http://contemosnosotros.org/pages/faq">FAQ</a></li>
                  <li><a href="http://contemosnosotros.org/pages/acercade">Acerca de Nosotros</a></li>
                </ul>                  
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="container info">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
      </div>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
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
  </body>
  
</html>

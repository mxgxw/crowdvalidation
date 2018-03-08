<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Contemos Nosotros :
        <?= $this->fetch('title') ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?= $this->Html->css('style.css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                <a class="navbar-brand" href="http://contemosnosotros.org/"><img alt="Elecciones 2018" src="img/banner.jpg"></a>
              </div>

              <div class="collapse navbar-collapse  pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="inicio"><a href="http://contemosnosotros.org/">Inicio</a></li><!--
                  <li class="resultados"><a href="http://contemosnosotros.org/pages/resultados">Resultados</a></li>
                  <li class="faq"><a href="http://contemosnosotros.org/pages/faq">FAQ</a></li>
                  <li class="acercade"><a href="http://contemosnosotros.org/pages/acercade">Acerca de Nosotros</a></li>
                  <li class="agradecimientos"><a href="http://contemosnosotros.org/pages/agradecimientos">Agradecimientos</a></li>-->
                </ul>                  
              </div>
            </div>
          </div>
        </nav>
      </div>
      <div class="container info">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
      </div>
    </div>
    <footer class="container">
    	<ul class="">
                  <li class="inicio"><a href="http://contemosnosotros.org/">Inicio</a></li>
                 <!-- <li class="resultados"><a href="http://contemosnosotros.org/pages/resultados">Resultados</a></li>
                  <li class="faq"><a href="http://contemosnosotros.org/pages/faq">FAQ</a></li>
                  <li class="acercade"><a href="http://contemosnosotros.org/pages/acercade">Acerca de Nosotros</a></li>
                  <li class="acercade"><a href="http://contemosnosotros.org/pages/agradecimientos">Agradecimientos</a></li>-->
                </ul> 
       <!--<ul class="">
                  <li><a href="https://github.com/mxgxw/crowdvalidation" target="_blank"><img alt="github" src="/img/github.png"> Crowdvalidation</a></li>
                  <li><a href="https://gist.github.com/hkadejo/9522141" target="_blank"><img alt="github" src="/img/github.png"> Corte de Actas</a></li>
                  <li><a href="http://contemosnosotros.org/app/webroot/sqldumps/" target="_blank"><img alt="filedir" src="/img/github.png"> Base de datos (DUMP SQL)</a></li>
                </ul>  -->
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
</body>
</html>

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
<!--[if lt IE 7]><html class="ie6 oldie" lang="es"> <![endif]-->
<!--[if IE 7]>   <html class="ie7 oldie" lang="es"> <![endif]-->
<!--[if IE 8]>   <html class="ie8 oldie" lang="es"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<!--<![endif]-->
<head>
    <?php echo $this->Html->charset(); ?>
    <title>Contemos Nosotros Web App para validar actas de votación</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <!-- Bootstrap -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('ripples.min'); ?>
    <?php echo $this->Html->css('material-wfont.min'); ?>
    <?php echo $this->Html->css('snackbar.min'); ?>
    <?php echo $this->Html->css('custom'); ?>

    <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,700'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo $this->Html->script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'); ?>
    <?php echo $this->Html->script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'); ?>
    <![endif]-->

</head>
<body>
<div id="main-header">
    <!-- NAVBAR  -->
    <div class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link('Elecciones 2015', '/', array('class' => 'navbar-brand')); ?>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="<?php if($this->viewVars['page'] == 'acercade') { echo 'active'; } ?>">
                        <?php echo $this->Html->link('Elecciones 2015', '/pages/acercade'); ?>
                    </li>
                    <li class="<?php if($this->viewVars['page'] == 'agradecimientos') { echo 'active'; } ?>">
                        <?php echo $this->Html->link('Agradecimientos', '/pages/agradecimientos'); ?></li>
                    <li class="<?php if($this->viewVars['page'] == 'faq') { echo 'active'; } ?>">
                        <?php echo $this->Html->link('FAQ', '/pages/faq'); ?>
                    </li>
                    <li class="dropdown">
                        <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle"
                           data-toggle="dropdown">Resultados <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if($this->viewVars['page'] == 'faq') { echo 'active'; } ?>">
                                <?php echo $this->Html->link('Alcaldes', '/pages/alcaldes'); ?>
                            </li>
                            <li class="<?php if($this->viewVars['page'] == 'diputados') { echo 'active'; } ?>">
                                <?php echo $this->Html->link('Diputados', '/pages/diputados'); ?>
                            </li>
                            <li class="<?php if($this->viewVars['page'] == 'parlacen') { echo 'active'; } ?>">
                                <?php echo $this->Html->link('Parlacen', '/pages/parlacen'); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //NAVBAR   -->
</div>

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="">
                    <li class="inicio"><?php echo $this->Html->link('Inicio', '/'); ?></li>
                    <li class="resultados"><?php echo $this->Html->link('Resultados', '/pages/resultados'); ?></li>
                    <li class="faq"><?php echo $this->Html->link('FAQ', '/pages/faq'); ?></li>
                    <li class="acercade"><?php echo $this->Html->link('Acerca de nosotros', '/pages/acercade'); ?> </li>
                    <li class="acercade"><?php echo $this->Html->link('Agradecimientos', '/pages/agradecimientos'); ?></li>
                </ul>
                <ul class="">
                    <li><a href="https://github.com/mxgxw/crowdvalidation" target="_blank"><img alt="github"
                                                                                                src="/img/github.png">
                            Crowdvalidation</a></li>
                    <li><a href="https://gist.github.com/hkadejo/9522141" target="_blank"><img alt="github"
                                                                                               src="/img/github.png">
                            Corte de Actas</a></li>
                    <li><a href="http://contemosnosotros.org/app/webroot/sqldumps/" target="_blank"><img alt="filedir"
                                                                                                         src="/img/github.png">
                            Base de datos (DUMP SQL)</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5321ea53081e0c25"></script>
<script type="text/javascript">
    addthis.layers({
        'theme': 'transparent',
        'share': {
            'position': 'left',
            'numPreferredServices': 5
        }
    });
</script>
<!-- AddThis Smart Layers END -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min', 'ripples.min', 'material.min', 'snackbar.min')); ?>

<!-- mario revisate estos scripts porfavor    -->
<script type="text/javascript">
    var token = 0;
    function loadNew() {
        $.ajax({
            url: "./valida/"
        }).done(function (data) {
            token = data.token;
            $('#imgContainer').html('<img src="./valida/image/' + token + '"/>');
            $('#txtCounter').val("");
        })
    }
    function sendResult() {
        if (token != 0) {
            $.ajax({
                url: "./valida/conteo/",
                type: 'POST',
                data: {token: token, value: $('#txtCounter').val()}
            }).done(function (data) {
                if (data.Status) {
                    $("#alert-box").show()
                    window.setTimeout(function () {
                        $("#alert-box").hide();
                    }, 3000);
                    $('#txtCounter').val("");
                    loadNew();
                }
                if (data.Error) {
                    window.alert("Error: " + data.Error);
                }
                $("#btnSend").removeAttr("disabled");
                $("#btnSend").text("Enviar Acta")
            })
        }
    }
    console.log($);
    $(function () {
        $("#alert-close-btn").on("click", function () {
            $("#alert-box").hide();
        });
        $('#btnSend').click(function () {
            $("#btnSend").attr("disabled", "disabled");
            $("#btnSend").text("Enviando Acta....")
            counter = $("#txtCounter").val();
            if (counter.indexOf("-") >= 0 || counter.indexOf("_") >= 0) {
                window.alert("No ingrese guiones");
                $("#btnSend").removeAttr("disabled");
                $("#btnSend").text("Enviar Acta");
                return
            }
            sendResult();
            imgContainer
        });
        $(document).keypress(function (e) {
            if (e.which == 13) {
                sendResult();
            }
        });
        loadNew();
    });
</script>
<?php echo $this->element('sql_dump'); ?>

<!-- scripts revision    -->

<script src="http://contemosnosotros.org/dist/js/jquery.nouislider.min.js"></script>
<script>
    $(function () {
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
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-60440558-1', 'auto');
    ga('send', 'pageview');
</script>
</body>

</html>
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

    // Include jQuery
    echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    echo $this->Js->writeBuffer(array('onDomReady' => false));

    // Include any other scripts you've set
    echo $this->fetch('script');
    ?>
    <!-- Bootstrap -->
    <?php echo $this->Html->css(array('bootstrap.min','ripples.min','material-wfont.min','snackbar.min','custom')); ?>

    <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,700'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo $this->Html->script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'); ?>
    <?php echo $this->Html->script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'); ?>
    <![endif]-->

</head>
<body class="<?php echo $this->params->params['controller'].'_'.$this->params->params['action']?>">
<!-- Navbar -->
<div id="main-header">
    <?php echo $this->element('nav')?>
</div>

<!-- Content -->
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

<!-- Footer -->
<?php echo $this->element('footer')?>


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
<?php echo $this->Html->script(array('bootstrap.min', 'ripples.min', 'material.min', 'snackbar.min')); ?>

<!-- Init Material Design -->
<script type="text/javascript">
    $(function () {
        $.material.init();
    });
</script>

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


<!-- Google Analytics -->
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
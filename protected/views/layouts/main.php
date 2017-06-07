<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!--Bootstrap-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
        <!--Font awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--css-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <!--Menu principal-->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header logoeci  page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand header-t" href="#">
                        Avisfor
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                                <?php echo Chtml::link('Inicio',array('/site/index'))?>
                        </li>
                        <li>
                                <?php echo Chtml::link('Contactenos',array('/site/contact'))?>
                        </li>
                        <li>
                                <?php echo Chtml::link('<i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar',array('/site/login'))?>
                        </li>
                        <li>
                                <?php echo Chtml::link('<i class="fa fa-users" aria-hidden="true"></i> Registrarse',array('/site/login'))?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id = "intro" class="intro">
            <div class="slogan">
                <h2>Sistemas Formales<br />
                    Escuela Colombiana de ingeniería
                </h2>
            </div>    
        </section>

        <div class="container" id="page">
            <!--            <div id="mainmenu">
            <?php
//                $this->widget('zii.widgets.CMenu', array(
//                    'items' => array(
//                        array('label' => 'Home', 'url' => array('/site/index')),
//                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
//                        array('label' => 'Contact', 'url' => array('/site/contact')),
//                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
//                    ),
//                ));
            ?>
                        </div> mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>
        </div><!-- page -->

        <footer class="foo">
            <div class="col-sm-6 ini1">
                <p>Ambiente visual para el aprendizaje de los conceptos básicos  asociados a <br/> Los sistemas formales.</p>
            </div>

            <div class="col-sm-6 ini">
                <a href="http://www.escuelaing.edu.co" target="_blank">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="escuela de ingenieros"/>
                </a>
            </div>
            <p class="ini">Copyright &copy; <?php echo date('Y'); ?> by Escuela Colombiana de Ingenieria.<br/>
                All Rights Reserved.<br/>
            </p>
        </footer><!-- footer -->
    </body>
    <!--jquery-->
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(document).scrollTop() > 50) {
                    $('nav').addClass('shrink');
                } else {
                    $('nav').removeClass('shrink');
                }
            });
        });

    </script>
</html>


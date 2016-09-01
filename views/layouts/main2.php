<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */
$script=<<< JS
$(".btn-to-section").click(function() {
    var section=$(this).attr('to_section');
    $('html, body').animate({
        scrollTop: $("#"+section).offset().top
    }, 1000);
});
JS;
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="title" content="EXIT.">
     <meta name="description" content="Exit cuartos de escape."/>
     <meta name="google" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div id="general">
    <!-- -->

<!--     <div id="cont-iniciarsesion">
                <?php if(Yii::$app->user->isGuest){ ?>
                <a href="<?= Url::to(['site/login']) ?>">Iniciar Sesión</a>
                <?php }else{ ?>
                <a href="<?= Url::to(['user/index']) ?>"><?= Yii::$app->user->identity->names ?></a> / <a href="<?= Url::to(['site/logout']) ?>">Cerrar Sesión</a>
                <?php } ?>
    </div> -->

    <!-- -->
<!-- MENU CHAIDE -->
    <header>
        <nav class="navbar navbar-default">
          <div class="container-fluid" style="padding:0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a href="<?= Url::home() ?>"><img class="logo-header" src="<?= URL::base() ?>/images/logo.svg" alt="logotipo exit"/></a>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

              </button>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu-container" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                    <li class="m-menu"><a  href="<?= Url::home() ?>#what-is" to_section="what-is" class="btn-menu">¿QUÉ ES?</a></li>
                    <li class="m-menu"><a href="<?= Url::home() ?>#missions" to_section="missions" class="btn-menu">ELIGE UNA MISIÓN</a></li>
                    <li class="m-menu"><a href="#" class="btn-menu">GALERIA</a></li>
                    <li class="m-menu"><a href="<?= Url::home() ?>#missions" class="btn-menu">RESERVAS</a></li>
                    <li class="m-menu"><a href="<?= Url::home() ?>#find-us" to_section="find-us" class="btn-menu">¿CÓMO LLEGAR?</a></li>
                    <li class="m-menu"><a href="<?= Url::to(['site/contact']) ?>" class="btn-menu">CONTACTO</a></li>
                    <li class="m-menu"><a href="<?= Url::to(['site/contactp']) ?>" class="btn-menu">PRENSA Y MEDIOS</a></li>
                    <li class="m-menu"><a href="<?= Url::to(['site/company']) ?>" class="btn-menu">EMPRESAS</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>
            <?= $content ?>

<footer>
    <div class="footer-cierre">
        <ul>
<!--             <li><a href="https://www.facebook.com/ChaideOficial"><img src="<?= URL::base() ?>/images/ico-facebook.svg" alt="facebook"/></a></li> -->
          <!--   <li><img src="<?= URL::base() ?>/images/ico-twitter.svg" alt="twitter"/></li> -->
           <!--  <li><a href="https://www.youtube.com/user/ChaideyChaide"><img src="<?= URL::base() ?>/images/ico-youtube.svg" alt="youtube"/></a></li> -->
        </ul>
        ® <?= date('Y') ?> EXIT, Todos los Derechos Reservados.   Desarrollado por <a href="http://simplicityuniverse.com/" target="_blank">SIMPLICITY.</a>  
    </div>
</footer>
<!-- -->
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

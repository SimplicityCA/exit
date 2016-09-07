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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83703194-1', 'auto');
  ga('send', 'pageview');
JS;
$this->registerJs($script,View::POS_END);
//$this->registerJs($script2,View::POS_END);
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

    <header>

        <nav class="navbar navbar-default">
          <div class="container-fluid" style="padding:0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a href="<?= Url::home() ?>" class="logo-container"><img class="logo-header" src="<?= URL::base() ?>/images/logo.svg" alt="logotipo exit"/></a>
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
                    <li class="m-menu"><a  href="#¿QUÉ ES?" to_section="what-is" class="btn-menu btn-to-section">¿QUÉ ES?</a></li>
                    <li class="m-menu"><a href="#ELIGE UNA MISIÓN" to_section="missions" class="btn-menu btn-to-section">ELIGE UNA MISIÓN</a></li>
                    <li class="m-menu"><a href="<?= Url::to(['site/gallery']) ?>" class="btn-menu">GALERIA</a></li>
                    <li class="m-menu"><a href="#" to_section="missions" class="btn-menu btn-to-section">RESERVAS</a></li>
                    <li class="m-menu"><a href="#ENCUÉNTRANOS" to_section="find-us" class="btn-menu btn-to-section">¿CÓMO LLEGAR?</a></li>
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
        ® <?= date('Y') ?> EXIT, Todos los Derechos Reservados.   Desarrollado por <a href="http://simplicityuniverse.com/" target="_blank">SIMPLICITY</a>& CONCEPT  
    </div>
</footer>
<!-- -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

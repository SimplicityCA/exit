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
// $script='$(document).ready(function() {
// $("#menu-chaide").click(function(){
//         $(this).toggleClass("active");
//         $("#menu-mobile").toggleClass("menu-active");
//         $("#general").toggleClass("general-active");
//     });  
//    $(".btn-cerrarw").click(function(){
//        $(".flash_message_warning").fadeOut();
//        $(".flash_message_success").fadeOut();
       
//        });
//     $("#btn-submobile-p").click(function(){
//         $("#submenu-mobile").slideToggle();
//     }); 
//     $("#b-buscar").click(function(){
//         $("#cont-buscardor").addClass("to-right");
//     });
//     $("#btn-cerrarb").click(function(){
//         $("#cont-buscardor").removeClass("to-right");
//     }); 
// });';
$script=<<< JS
$(".btn-menu").click(function() {
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
        <nav>
            <ul>
                <li><a href="<?= Url::home() ?>"><img src="<?= URL::base() ?>/images/logo.svg" alt="logotipo exit"/></a></li>
                <li class="m-menu"><a  href="<?= Url::home() ?>#what-is" to_section="what-is" class="btn-menu">¿QUÉ ES?</a></li>
                <li class="m-menu"><a href="<?= Url::home() ?>#missions" to_section="missions"class="btn-menu">ELIGE UNA MISIÓN</a></li>
                <li class="m-menu"><a href="#" class="btn-menu">GALERIA</a></li>
                <li class="m-menu"><a href="#" class="btn-menu">RESERVAS</a></li>
                <li class="m-menu"><a href="<?= Url::home() ?>#find-us" to_section="find-us" class="btn-menu">ENCUÉNTRANOS</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/contact']) ?>" class="btn-menu">CONTACTO</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/company']) ?>" class="btn-menu">EMPRESAS</a></li>
            </ul>
            <div id="barra-mobile">
                <a id="menu-chaide"><span></span></a>
            </div>
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
<!-- menu mobile -->
<div id="menu-mobile">
    <div class="con-submenumobile">
        <ul>
                <li class="m-menu"><a href="<?= Url::to(['locale/index']) ?>" class="hvr-bounce-to-top">HOME</a></li>
                <li class="m-menu"><a href="<?= Url::to(['article/index','type'=>'news']) ?>" class="hvr-bounce-to-top">¿QUÉ ES?</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/innovation']) ?>" class="hvr-bounce-to-top">ELIGE UNA MISIÓN</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/innovation']) ?>" class="hvr-bounce-to-top">GALERIA</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/innovation']) ?>" class="hvr-bounce-to-top">RESERVAS</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/innovation']) ?>" class="hvr-bounce-to-top">ENCUÉNTRANOS</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/innovation']) ?>" class="hvr-bounce-to-top">CONTACTO</a></li>
                <li class="m-menu"><a href="<?= Url::to(['site/innovation']) ?>" class="hvr-bounce-to-top">EMPRESAS</a></li>
       </ul>
   </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

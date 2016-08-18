<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
$script=<<< JS
 var fotorama = $('.fotorama').data('fotorama');
$("#play").click(function(){
        $("#video-colchon-interna").get(0).play();  
        $("#play").fadeOut();
        $("#stop").show();
    });
$("#stop").click(function(){
        $("#stop").hide();
        $("#video-colchon-interna").get(0).pause(); 
        $("#play").fadeIn();
    });
JS;
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
$this->title = 'EXIT';
?>
<!-- -->
<section  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/<?= $home->picture ?>')">
    <div class="inf-home">
        <span><?= $home->title ?>
              </span>
         <span class="second-text-home">
         <?= $home->subtitle ?>
        </span>
        <a href="#">
            <div class="btn-comprara">
                Seleccionar una misión.
            </div>
        </a>
    </div>

</section>

<section class="cont-exitint2" >
    <h1>Exit es un juego</h1>
        <div class="it-is-cont">
            <div class="row">
              <div class="col-sm-8">Estarás encerrado en una habitación temática y tienes 60 minutos para completar una misión y salir victorioso.</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/reloj.svg" /></div>
              <hr class="style-three"></hr>
            </div>
            <div class="row">
              <div class="col-sm-8">Deberás resolver enigmas, encontrar pistas, abrir puertas secretas, desactivar bombas y escapar.</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/21.svg" /></div>
              <hr class="style-three"></hr>
            </div>
            <div class="row">
              <div class="col-sm-8">Escapes o no, vivirás una experiencia única para compartir con amigos, compañeros y familia en equipos de 2 a 6 personas. ¿Puedes lograr que tu equipo sea el mejor?</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/22.svg" /></div>
               <hr class="style-three"></hr>
            </div>
        </div>
<!--     <div class="secc-intcolchon">
        <ul class="ventajas-1">
 
            <li>
                <h1>test</h1>
                <p>
                test
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/test.svg" class="img-propiedad"/>
            </li>
          
        </ul>   
    </div> -->
</section>

<section  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/mision.svg')">
    <div class="info-mis">
        <h1>MISIONES</h1>
            <div class="row">
            <span>Estarás encerrado en una habitación temática y tienes 60 minutos para completar una misión y salir victorioso. </span><br/>

<span>Deberás resolver enigmas, encontrar pistas, abrir puertas secretas, desactivar bombas y escapar.</span><br/>

<span>Escapes o no, vivirás una experiencia única para compartir con amigos, compañeros y familia en equipos de 2 a 6 personas. ¿Puedes lograr que tu equipo sea el mejor?</span><br/>
            </div>
            
                
          
    </div>
        <h1>ELIGE UNA MISIÓN</h1>
        <div class="row">
        <span>
Para escapar debes superar todas las pruebas, no serán necesarios conocimientos previos, solo la lógica, la rapidez de reacción y el trabajo en equipo. Pase lo que pase, vivirás una experiencia ultra divertida que la recordarás por mucho tiempo.
        </span>
      </div>
</section>

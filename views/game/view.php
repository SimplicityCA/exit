<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
// $script=<<< JS

// JS;
// $this->registerJs($script,View::POS_END);

AppAsset::register($this);
$this->title = 'EXIT | <?= $model->title ?> <?= $model->subtitle ?>';
?>
<!-- -->
<section id="home"  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/game/<?= $model->landing_picture ?>')">
    <div class="inf-home">
        <span><?= $model->title ?>
              </span>
         <span class="second-text-home">
         <?= $model->subtitle ?>
        </span>
        <a href="#MISIONES" class="btn-menu" >
            <div class="btn-comprara">
                Reserva ya!
            </div>
        </a>
    </div>

</section>

<section id="what-is" class="cont-exitint2" >
    <h1>Descripción del juego</h1>
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
</section>


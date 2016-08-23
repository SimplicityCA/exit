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
$this->title = "EXIT |  $model->title $model->subtitle";
?>
<!-- -->
<section id="home"  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/game/<?= $model->landing_picture ?>')">
    <div class="inf-home">
        <span><?= $model->title ?>
              </span>
         <span class="second-text-home">
         <?= $model->subtitle ?>
        </span>
        <a href="#" to_section="reserve"class="btn-menu" >
            <div class="btn-comprara">
                Reserva ya!
            </div>
        </a>
    </div>

</section>

<section id="what-is" class="cont-exitint2" >
    <h1>Descripción del juego</h1>
        <div class="it-is-cont">
            <div class="row" style="font-size: 1.87em;">
              <?= $model->description ?>
              
              <hr class="style-three"></hr>
            </div>
        </div>
</section>
<section id="find-us" class="cont-exitint3" style="background-image:url('<?= URL::base() ?>/images/pie-01.jpg')">
    
    <h1 style="color:white;">HALL OF FAME</h1>
    <div class="it-is-cont">
    <div class="row" style="margin-bottom:2%">
      <span style="color:white;">RECORD HISTÓRICO</span>
      <div class="col-sm-4" >
        <img  src="<?= URL::base() ?>/images/game/IMG_0029 (1).JPG" />
      </div>
      <div class="col-sm-8" style="color:white;font-size:1.1em;font-weight:200">
        <?= $model->recordh ?>
      </div>
    </div>
    <div class="row" style="margin-bottom:2%">
      <span style="color:white;">MEJOR TIEMPO AGOSTO 2016</span>
      <div class="col-sm-4" >
        <img  src="<?= URL::base() ?>/images/game/IMG_0029 (1).JPG" />
      </div>
      <div class="col-sm-8" style="color:white;font-size:1.1em;font-weight:200">
      <?= $model->recordm ?>
      </div>
    </div>
    </div>
</section>
<section id="reserve" class="cont-exitint2" >
    <h1>Reservas</h1>
        <div class="reserve">
            <div class="row">
                   <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));?>
              
              <hr class="style-three"></hr>
            </div>
        </div>
</section>


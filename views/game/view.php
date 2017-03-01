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
$(document).ready(function() {
 $('.fc-agendaWeek-button').click();
});
JS;
 $this->registerJs($script,View::POS_END);

AppAsset::register($this);
$this->title = "EXIT |  $model->title $model->subtitle";
$device=\Yii::getAlias('@device');
?>
<!-- -->
<?php if(!$model->video || $device!='desktop'){ ?>
<section id="home"  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/game/<?= $model->landing_picture ?>')">
      <div class="container">
        <div class="inf-home">
          <span><?= $model->title ?>
                </span>
           <span class="second-text-home">
           <?= $model->subtitle ?>
          </span>
          <a href="#" to_section="reserve"class="btn btn-comprara btn-to-section" >
                  Reserva ya!
          </a>
        </div>
    </div>
</section>
<?php }else{ ?>
<section id="home"  class="background-exitint interna-exit video-background" >
      <div class="container ">
            <div class="video-foreground">
      <iframe src="https://www.youtube.com/embed/<?= $model->video ?>?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=<?= $model->video ?>" frameborder="0" allowfullscreen></iframe>
    </div>
        <div class="inf-home">
          <span><?= $model->title ?>
                </span>
           <span class="second-text-home">
           <?= $model->subtitle ?>
          </span>
          <a href="#" to_section="reserve"class="btn btn-comprara btn-to-section" >
                  Reserva ya!
          </a>
        </div>
    </div>
</section>
<?php } ?>
<section class="cont-exitint2 game-view-what-is" >
    <div class="container" >
      <div class="col-xs-12" >
      <h1>Descripción del juego</h1>
          <div class="it-is-cont">
              <div class="row">
                <?= $model->description ?>
                
                <hr class="style-three"></hr>
              </div>
          </div>
      </div>
    </div>
</section>
<section class="cont-exitint3" style="background-image:url('<?= URL::base() ?>/images/pie-01.jpg')">
    <div class="container hall-of-fame" >
      <h1>HALL OF FAME</h1>
      <div class="it-is-cont">
        <?php foreach($model->pictures as $picture): ?>
        <?php if($picture->type=="WINNERT"){ ?>
        <div class="row">
          <h3 class="title-hall"><?= $picture->title ?></h3>
          <div class="col-sm-4" >
            <img  src="<?= URL::base() ?>/images/<?= $picture->description ?>" />
          </div>
          <div class="col-sm-8" style="color:white;font-size:1.1em;font-weight:200">
            
            <?= $picture->record ?>
          </div>
        </div>
        <?php } ?>
      <?php endforeach; ?>
      <div id="winnersm" class="carousel slide" data-ride="carousel" style="color:white;font-size:1.1em;font-weight:200">
        <div  class="carousel-inner" role="listbox" style="color:white;font-size:1.1em;font-weight:200">
      <?php foreach($model->pictures as $k => $picture): ?>
        <?php if($picture->type=="WINNERM"){ ?>
            
           <?php $aux = ($k==0) ? 'active' : ''; ?>
        <div class="row item <?= $aux ?>">
          <h3 class="title-hall"><?= $picture->title ?></h3>
          <div class="col-sm-4" >
            <img  src="<?= URL::base() ?>/images/<?= $picture->description ?>" />
          </div>
          <div class="col-sm-8" style="color:white;font-size:1.1em;font-weight:200">
            
            <?= $picture->record ?>
          </div>
        </div>
        <?php } ?>        
      <?php endforeach; ?>
                                  <ol class="carousel-indicators">
                                     <?php $count=0; ?>
                <?php foreach($model->pictures as $k => $picture): ?>
        <?php if($picture->type=="WINNERM"){ ?>
        <?php $aux = ($k==0) ? 'active' : ''; ?>
       
      <li data-target="#winnersm" data-slide-to="<?= $count?>" class="<?= $aux ?>"></li>
      <?php $count+=1; ?>
           <?php } ?>        
      <?php endforeach; ?>
      </ol>
               </div> 
          </div>
      </div>
  </div>
</section>
<section id="reserve" class="cont-exitint2" >
  <div class="container">
    <h1>Horarios Disponibles</h1>
        <div class="reserve">
            <div class="row">
                   <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'options'=>[
        'locale'=>'es',
      ],
      'clientOptions'=>[
      'default'=>'agendaweek',
      'displayEventEnd'=>true,
       'timeFormat'=> 'HH:mm',
      ],
      'events'=> $events
  ));?>
              
              <hr class="style-three"></hr>
            </div>
        </div>
    </div>
</section>


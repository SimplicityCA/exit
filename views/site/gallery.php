<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\web\View;
use app\assets\AppAsset;
$count=count($model);
$aux="";
$script=<<< JS

JS;
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
$this->title = 'GALERÍA';
$this->params['breadcrumbs'][] = $this->title;
?>
<section   class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/4.svg')">
    <h1 class="contact-us-h1"><?= Html::encode($this->title) ?></h1>
      <div class="container">
          <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php foreach($model as $k => $picture): ?>
              <?php $aux = ($k==0) ? 'active' : ''; ?>
              <li data-target="#myCarousel" data-slide-to="<?= $k ?>" class="<?= $aux ?>"></li>
              <?php endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php foreach($model as $k => $picture): ?>
              <?php $aux = ($k==0) ? 'active' : ''; ?>
              <div class="item <?= $aux ?>">
                <img src="<?= URL::base() ?>/images/<?= $picture->description ?>" alt="">
              </div>
               <?php endforeach; ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
         </div> 
    </div>
</section>

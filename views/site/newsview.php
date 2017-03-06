<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\web\View;
use app\assets\GalleryAsset;
GalleryAsset::register($this);
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<section   class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/4.svg')">
    <h1 class="contact-us-h1"><?= Html::encode($this->title) ?></h1>
      <div class="container" style="margin-top:3%">
          <div class="row">
          	<div class="col-md-6"><img  class="img-responsive" src="<?= URL::base() ?>/images/news/<?= $model->picture ?>" /></div>
          	            <div class="col-md-5" style="color:white">
            	<p><?= $model->description ?></p>
            </div>
            </div>

      </div>
      
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

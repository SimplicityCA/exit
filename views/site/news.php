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
$this->title = 'NOTICIAS';
$this->params['breadcrumbs'][] = $this->title;
?>
<section   class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/4.svg')">
    <h1 class="contact-us-h1"><?= Html::encode($this->title) ?></h1>
      <div class="container">
          <div class="row">
            <?php foreach($news as $k => $new): ?>
            <div class="col-md-3">
              <a href="<?= URL::to(['site/newsview','id'=>$new->id]) ?>" >
                <img class="thumbnail-gallery" src="<?= URL::base() ?>/images/news/<?= $new->picture ?>" alt="">
                <div class="title-thumb-news"><?= $new->title ?></div>
              </a>
          </div>
            <?php endforeach; ?>
            </div>
      </div>
      
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

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
          <div id="links">
            <?php foreach($model as $k => $picture): ?>
              <a href="<?= URL::base() ?>/images/<?= $picture->description ?>" data-gallery>
                <img class="thumbnail-gallery" src="<?= URL::base() ?>/images/<?= $picture->description ?>" alt="">
              </a>
            <?php endforeach; ?>
            </div>
      </div>
      
</section>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

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
$this->title = "EXIT |  Felicidades";
?>
<!-- -->

<section id="find-us" class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/slide1.jpg')">


<div class="client-form" style="margin-top:10%;color:white;">
	<h1>Felicidades <?= $model->names ?> la reserva para <?= $model->reserve->game->title ?> <?= $model->reserve->game->subtitle ?> se ha realizado con éxito</h1>
	<span>Fecha de inicio del juego: <?= $model->reserve->start_date ?></span>
</div>

</section>


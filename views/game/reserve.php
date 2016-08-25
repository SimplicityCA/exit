<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
$price=$reserve->game->price;
$price_d=$reserve->game->price_d;
$script=<<< JS
$("#client-pay_method").change(function() {
var players=$('#client-number_players').val();
var price=$price;
if($(this).val()!='RESERVE'){
price=$price_d;
}
var total= price*players;
$('#price').html(total);
$('#client-total_price').val(total);
});
JS;
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
$this->title = "EXIT |  ".$reserve->game->title." ".$reserve->game->subtitle;
?>
<!-- -->

<section id="find-us" class="cont-exitint3" style="background-image:url('<?= URL::base() ?>/images/pie-01.jpg')">


<div class="client-form" style="margin-top:10%;color:white;">
	<h1>Reserva para <?= $this->title ?> </h1>
	<h1>Fecha y hora de inicio <?= $reserve->start_date ?> </h1>
	<h1>Descuento del 20% si pagas en línea.</h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>



        <?= $form->field($model, 'number_players')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pay_method')->dropDownList(['prompt'=>'Seleccione una Opción','PAYPAL' => 'PAYPAL','RESERVE'=>'Solo Reserva sin Pago']) ?>
        <?= $form->field($model, 'total_price')->hiddenInput()->label(false); ?>
    <div class="form-group">
    	Precio: <div id="price">0</div>
        <?= Html::submitButton($model->isNewRecord ? 'Reservar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</section>


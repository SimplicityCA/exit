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

<section id="find-us" class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/4.svg')">

    
<div class="inf-contact" style="margin-top:10%;" >
<h1>Reserva para <?= $this->title ?> </h1>

            <div class="row" style="color:white;">
                    <span>Fecha y hora de inicio <?= $reserve->start_date ?> </span>
    <span>Descuento del 20% si pagas en línea.</span>
            <div class="row">
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
</div>
</div>

</section>


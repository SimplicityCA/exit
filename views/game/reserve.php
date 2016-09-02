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
$(".pay").change(function() {
var players=$('#client-number_players').val();
var price=$price;
if($(this).val()!='RESERVE'){
price=$price_d;
}
var total= price*players;
$('#price').html(total);
$('#client-total_price').val(total);
});
$(".pay").on('input',function(e){
var players=$('#client-number_players').val();
var price=$price;
if($(this).val()!='RESERVE'){
price=$price_d;
}
var total= price*players;
$('#price').html(total);
$('#client-total_price').val(total);
});
$(document).ready(function() {
    $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$(".letters").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            event.preventDefault(); 
        }
    });
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
        <?php if (Yii::$app->session->hasFlash('alert')): ?>
  <div class="alert alert-warning alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Alerta!</h4>
  <?= Yii::$app->session->getFlash('alert') ?>
  </div>
<?php endif; ?>
            <div class="row" style="color:white;">
                    <span>Fecha y hora de inicio <?= $reserve->start_date ?> </span>
    <span>Descuento del 20% si pagas en línea.</span>
            <div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identity')->textInput(['maxlength' => true,'class'=>'number form-control']) ?>

    <?= $form->field($model, 'names')->textInput(['maxlength' => true,'class'=>'letters form-control']) ?>

    <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true,'class'=>'letters form-control']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'class'=>'number form-control']) ?>

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true,'class'=>'number form-control']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>



        <?= $form->field($model, 'number_players')->textInput(['maxlength' => true,'class'=>'number form-control pay']) ?>

        <?= $form->field($model, 'pay_method')->dropDownList(['PAYPAL' => 'PAYPAL','RESERVE'=>'Pago en Efectivo'],['prompt'=>'Seleccione una Opción','class'=>'pay']) ?>
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


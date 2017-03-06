<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
$price=$reserve->game->price;
$price_d=$reserve->game->price_d;
$min_people=$reserve->game->min_people;
$max_people=$reserve->game->max_people;
$i=0;
if($params!=0){
foreach($params as $param){
$discount[$param->description]=$param->value;
}
}else{
  $params=array();
for($i=$min_people; $i<=$max_people; $i++){
  $discount["$i"]=0;
  $params[$i]["description"]=$i;
}
}
$discount=json_encode($discount);
// die($discount);
$script=<<< JS
$(".pay").change(function() {
$('#ticket').hide();
var players=$('#client-number_players').val();
var price=$price;
var i=$min_people;
var max=$max_people
var discount=$discount;
if($('#client-pay_method').val()=='PAYPAL'){
price=$price_d;
}
if($('#client-pay_method').val()=='TICKET'){
$('#ticket').show();
}
var total= price*players-(players*discount[players]);
$('#price').html(total);
$('#client-total_price').val(total);
});
$(".pay").on('input',function(e){
$('#ticket').hide();
var players=$('#client-number_players').val();
var price=$price;
var i=$min_people;
var max=$max_people
var discount=$discount;
if($('#client-pay_method').val()=='PAYPAL'){
price=$price_d;
}
if($('#client-pay_method').val()=='TICKET'){
$('#ticket').show();
}
var total= price*players-(players*discount[players]);;
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
$(".letters").on('input', function(event) {
  this.value = this.value.replace(/[^a-z\s ñ]/gi,'');
});
});
JS;
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
$this->title =$reserve->game->title." ".$reserve->game->subtitle." ".$reserve->id;
?>
<!-- -->

<section id="find-us" class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/4.svg')">
<div class="inf-contact" style="margin-top:10%;" >

<h1>Reservar <?= $this->title ?> </h1>
        <?php if (Yii::$app->session->hasFlash('alert')): ?>
  <div class="alert alert-warning alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <!-- <h4><i class="icon fa fa-check"></i>Alerta!</h4> -->
  <?= Yii::$app->session->getFlash('alert') ?>
  </div>
<?php endif; ?>
            <div class="row" style="color:white;">
                    <span>Fecha y hora de inicio <?= $reserve->start_date ?> </span>
            <div class="row">
                          <div class="row" style="color:white;">
                    <span>              AVISO IMPORTANTE:  </br> 
TODA LA INFORMACIÓN QUE SE INGRESE EN ESTE FORMULARIO DEBE SER REAL Y PRECISA. 
UNA VEZ ENVIADO EL FORMULARIO NOSOTROS NOS PONDREMOS EN CONTACTO PARA VERIFICAR LA RESERVA. 
EN CASO DE NO PODER CONTACTARNOS LA RESERVA SERÁ ELIMINADA .</span>
            <div class="row">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'names')->textInput(['maxlength' => true,'class'=>'letters form-control']) ?>

    <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true,'class'=>'letters form-control']) ?>

    

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true,'class'=>'number form-control']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>



         <?= $form->field($model, 'number_players')->dropDownList( ArrayHelper::map($params, 'description', 'description'),['prompt'=>'Seleccione una Opción','class'=>'number form-control pay']) ?>
        <?= $form->field($model, 'pay_method')->dropDownList(['RESERVE'=>'Pago en Efectivo','TICKET'=>'Pago con Ticket'],['prompt'=>'Seleccione una Opción','class'=>'pay form-control']) ?>
        <input style="display:none" class="form-control" id="ticket" type="text" name="ticket" placeholder="Ticket" />
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


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
$this->title = "EXIT |  Felicidades <?= $model->names ?>";
function fecha($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
}
?>
<!-- -->

<section id="find-us" class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/fondo_reservas.jpg')">
<div class="container row" style="margin-top:12%;padding:2%;">
<div class="col-md-5" style="color:white;">

  <img class="img-responsive img-thumbnail" style="width:90%" src="<?= URL::base() ?>/images/game/<?= $model->reserve->game->picture ?>">
  </div>
	<div class="col-md6" style="color:white;text-align:center;">
		<h2 class="title-reserve">Gracias! <?= $model->names ?> </h2>
		<p><span class="date-reserve">Tu reserva se ha realizado exitosamente</span></p>
        <p><h2 class="title-reserve"><?= fecha($model->reserve->start_date) ?><br><?=date('H:i',strtotime($model->reserve->start_date)) ?></h2></p>
		<p><span class="date-reserve" style="font-size: 5.5mm;">Si tu correo o número telefónico no son verificables, tu reserva podría ser cancelada.</span></p>
	</div>
</div>
</section>


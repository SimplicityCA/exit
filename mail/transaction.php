<?php

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
<table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">Reserva Cliente <?= $model->names ?> <?= $model->lastnames ?></span>
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="font-size: 20px !important;">
                        <p>Hola <?= $model->names ?> <?= $model->lastnames ?>,</p><br>
                        <p><strong>Tu reserva del "<?= $model->reserve->game->title ?> <?= $model->reserve->game->subtitle ?>" está confirmada !</strong></p><br>
                        <p><strong>Celular: </strong><?= $model->cellphone ?></p>
                        <p><strong>Email: </strong><?= $model->email ?></p>
                        <p><strong>Fecha: </strong><?= fecha($model->reserve->start_date) ?></p>
                        <p><strong>Hora: </strong><?= date('H:i',strtotime($model->reserve->start_date)) ?></p>
                        <p><strong>Participantes: </strong><?= $model->number_players ?></p>
                        <p><strong>Precio: </strong><?= $model->total_price ?></p>
                        
							<p style="font-size: 15px !important;margin-top:15px;  ">Entendemos que pueden haber motivos de fuerza mayor que obliguen a cancelar una reserva, en ese caso por favor notifícanos por correo 
              <a href="mailto:reservas@exit.com.ec?subject=Por Favor Cancelar Reserva #<?= $model->id ?>&body=Estimados Exit, deseo cancelar la reserva hecha a nombre de <?= $model->names ?> <?= $model->lastnames ?>">dando click aquí</a></p><br>
              <p><strong>EXIT TEAM</strong></p><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                      <img style="float:left;margin-right: 20px;" src="http://exit.com.ec/web/images/exit_logo_email.png">
                      <div style="float: left;">
                      <br>
                       <p style="font-size: 12px !important;">Dirección: Pasaje El Jardín y Av. 6 de Diciembre.</p>
                        <p style="font-size: 12px !important;"><a href="http://www.google.com/maps/place/-0.1802957,-78.478818">¿Cómo llegar?</a></p>
                        <p style="font-size: 12px !important;">Teléfono:<!--  <a href="tel:6007277" >6007277</a> /  --><a href="tel:0998703518" >0998703518</a></p>
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- END MAIN CONTENT AREA -->
              </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">EXIT <?= date('Y') ?> </span>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Powered by <a href="http://simplicityuniverse.com">Simplicity</a>.
                  </td>
                </tr>
              </table>
            </div>

            <!-- END FOOTER -->
            
<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
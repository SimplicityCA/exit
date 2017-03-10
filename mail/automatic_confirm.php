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
                        <div style="float:left; margin-left:60px;margin-right: 20px;width: 250px">
                        <br><br>
                            <p>Hola <?= $model->names ?> <?= $model->lastnames ?>,</p><br>
                            <p><strong>Faltan pocas horas para tu aventura!!</strong></p><br>
                            <p><?= $fecha ?></p><br>
                            <p><strong>Hora: </strong><?= date('H:i',strtotime($model->reserve->start_date)) ?></p><br>
  						          </div>
                        <img style="width: 150px;" src="http://exit.com.ec/web/images/game/<?= $model->reserve->game->picture ?>">
                        <br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                      <div style="font-size: 14px !important;margin-top: 10px;">
                      <ul style="font-size: 14px !important;">
                       <li style="font-size: 14px !important;margin-bottom: 5px;">Por favor <strong>llegar con 15 minutos de anticipación</strong>, este es un evento en vivo por lo que los horarios inician y terminan puntualmente.</li>
                       <li style="font-size: 14px !important;margin-bottom: 5px;">Sugerimos <strong>vestir ropa cómoda</strong> que permita movilidad.</li>
                       <li style="font-size: 14px !important;margin-bottom: 5px;">Se pueden <strong>aumentar o disminuir personas</strong> en la reserva sin necesidad de notificarnos, solo fíjate el grupo máximo permitido y el costo por persona en www.exit.com.ec/noticias</li>
                       <li style="font-size: 14px !important;margin-bottom: 5px;">Pagos con tarjeta de crédito aplican un recargo del 10%</li>
                        <li style="font-size: 14px !important;margin-bottom: 5px;">Deseas cancelar la reserva? Por favor da  <a href="mailto:reservas@exit.com.ec?subject=Por Favor Cancelar Reserva #<?= $model->id ?>&body=Estimados Exit, deseo cancelar la reserva hecha a nombre de <?= $model->names ?> <?= $model->lastnames ?>">click aquí</a></li>
                        </ul><br>
                        <p style="font-size: 14px !important;">Nos vemos pronto, los estamos esperando!!</p><br>
                      </div>
                      <br>
                      
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
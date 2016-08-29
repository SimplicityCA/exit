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
                      <td>
                        <p>Cédula:<?= $model->identity ?></p>
                        <p>Método de Pago <?= $model->pay_method ?></p>
                        <p>Teléfono:<?= $model->phone ?></p>
                        <p>Celular:<?= $model->cellphone ?></p>
                        <p>Email:<?= $model->email ?></p>
                        <p>Número de Jugadores:<?= $model->number_players ?></p>
                        <p>Precio:<?= $model->total_price ?></p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> 
                                      	<p>Reserva #:<?= $model->reserve_id ?></p>
                                      	<p>Juego:<?= $model->reserve->game->title ?> <?= $model->reserve->game->subtitle ?></p>
                                      	<p>Fecha:<?= $model->reserve->start_date ?></p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>

                        </table>
							<p>Si el pago se realizó a traves de paypal no te olvides de revisar la confirmación de pago en tu cuenta paypal.</p>
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
                    <span class="apple-link">EXIT 2016 </span>
                    <br> Don't like these emails? <a href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Powered by <a href="http://htmlemail.io">Simplicity</a>.
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
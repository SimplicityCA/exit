<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
$script=<<< JS
 function initialize(lat,long,description) {
    var myLatLng = {lat: lat, lng: long};
    var image = window.location.protocol + "//" + window.location.host +"/web/images/icono.gif";
    var icon = {
    url: image, // url
    // scaledSize: new google.maps.Size(120,40), // scaled size
    // origin: new google.maps.Point(0,0), // origin
    // anchor: new google.maps.Point(0, 0) // anchor
};
        var mapOptions = {
          center: new google.maps.LatLng(lat,long),
          zoom: 17,
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
//          width:"100%",
//          height:"100%"
          
        };
        var map = new google.maps.Map(document.getElementById("map"),
            mapOptions);
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: description,
    icon: icon
  });
 var infowindow = new google.maps.InfoWindow({
    content: description
  });
infowindow.open(map, marker);
      }
        function location_map(lat,long) {
        var mapOptions = {
          center: new google.maps.LatLng(lat,long),
          zoom: 19,
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
//          width:"100%",
//          height:"100%"
//       
        };
        var map = new google.maps.Map(document.getElementById("map"),
            mapOptions);
      }
$(document).ready(function() {
  initialize(-0.1802957,-78.478818,'Pasaje Jardín E10-46 y Avenida 6 de Diciembre');
    });
JS;
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyDaHaPsQQtspQ7Sm-azY4CQ4uuVjCRW0l4');
$this->registerJsFile('https://www.jscache.com/wejs?wtype=cdsratingsonlynarrow&amp;uniq=894&amp;locationId=10782795&amp;lang=en_US&amp;border=true&amp;display_version=2');
$this->registerJs($script,View::POS_END);
if($popup->status=='ACTIVE'){
  $script2=<<< JS
   $(window).load(function(){
        $('#myModal').modal('show');
    });
JS;
 $this->registerJs($script2,View::POS_END); 
}
AppAsset::register($this);
$this->title = 'EXIT';
?>
<?php if($popup->status=='ACTIVE'){ ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" style="float:left;" id="exampleModalLabel"> <?= $popup->description ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>

      <div class="modal-body">
    <?= $popup->value ?>
      </div>

    </div>
  </div>
</div>
<?php } ?>
<section id="home"  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/<?= $home->picture ?>')">
    <div class="container">
      <div class="inf-home">
          <span><?= $home->title ?>
                </span>
           <span class="second-text-home">
           <?= $home->subtitle ?>
          </span>
          <a href="#MISIONES" class="btn btn-comprara btn-to-section" to_section="missions">
                  Seleccionar una misión
          </a>

      </div>
          <div id="phrases" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->


            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php foreach($phrases as $k => $phrase): ?>
              <?php $aux = ($k==0) ? 'active' : ''; ?>
              <div class="item <?= $aux ?>">
                <?= $phrase->title ?>
              </div>
               <?php endforeach; ?>
            </div>
         </div> 
  <div id="trip-container" class="row row-centered">

      
  </div>
</section>
<div class="anchor-link" id="what-is"></div>
<section class="cont-exitint2" >
    <h1>Exit es un juego</h1>
        <div class="it-is-cont">
            <div class="row">
              <div class="col-sm-8">Estarás encerrado en una habitación temática, tienes 60 minutos para completar una misión y salir victorioso.</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/reloj.svg" /></div>
              <hr class="style-three"></hr>
            </div>
            <div class="row">
              <div class="col-sm-8">Tendrás que encontrar claves, resolver enigmas y mantenerte alerta. Para ganar tendrás que superar todas las pruebas. No se requiere conocimientos previos o hablidades físicas, solo la lógica, agilidad mental y juego en equipo.</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/21.svg" /></div>
              <hr class="style-three"></hr>
            </div>
            <div class="row">
              <div class="col-sm-8">Escapes o no, vivirás una experiencia súper divertida con amigos, compañeros o familia en equipos de 4 a 6 personas. </br> </br>¿Puedes lograr que tu equipo sea el mejor?</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/22.svg" /></div>
               <hr class="style-three"></hr>
            </div>
        </div>
               <div id="TA_excellent975" class="TA_excellent" >
          <ul id="HjAodF1xhtOg" class="TA_links x9V43wHH">
          <li id="FzeMuk5YJm" class="Z8Hp4x">
          <a target="_blank" href="https://www.tripadvisor.es/"><img src="https://static.tacdn.com/img2/widget/tripadvisor_logo_115x18.gif" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
          </li>
          </ul>
          </div>
          <script src="https://www.jscache.com/wejs?wtype=excellent&amp;uniq=975&amp;locationId=10782795&amp;lang=es&amp;display_version=2"></script>
</section>

<div class="anchor-link" id="missions"></div>
<section  class="background-mision interna-exit4" style="background-image:url('<?= URL::base() ?>/images/slide1.jpg')">
<!--     <div class="info-mis">
        <h1>MISIONES</h1>
            <div class="row">
            <span>Estarás encerrado en una habitación temática y tienes 60 minutos para completar una misión y salir victorioso. </span><br/>

<span>Deberás resolver enigmas, encontrar pistas, abrir puertas secretas, desactivar bombas y escapar.</span><br/>

<span>Escapes o no, vivirás una experiencia única para compartir con amigos, compañeros y familia en equipos de 2 a 6 personas. ¿Puedes lograr que tu equipo sea el mejor?</span><br/>
            </div>
            
                
          
    </div> -->
        <h1>ELIGE UNA MISIÓN</h1>
        <div class="info-mis-second">
          <span>
            Para escapar debes superar todas las pruebas, no serán necesarios conocimientos previos, solo la lógica, la rapidez de reacción y el trabajo en equipo. Pase lo que pase, vivirás una experiencia ultra divertida que la recordarás por mucho tiempo.
          </span>
        </div>
        <div class="mission">
          <?php foreach($games as $game): ?>
              <div class="col-sm-2 game-container">
                <a href="<?= ($game->status == 'ACTIVE') ? Url::to(['game/view','id'=>$game->id]) : 'javascript:void(0)' ?>">
                  <img src="<?= URL::base() ?>/images/game/<?= $game->picture ?>" class="img-propiedad"/>
<!--                   <?php if($game->status == 'INACTIVE'){ ?>
                  <div class="mis-label" style="<?= ($game->status == 'INACTIVE') ? 'background:gray;' : '' ?>"><span class="mis-tit"><?= $game->title ?></span> <br/> <span class="mis-subtit"><?= $game->subtitle ?></span>
                    <?= ($game->status == 'INACTIVE') ? '<br/>PROXIMAMENTE' : '' ?>
                  </div>
                   <?php } ?> -->
                  
                </a>
              </div>
            <?php endforeach; ?>
        </div>

</section>
<div class="anchor-link" id="find-us"></div>
<section class="cont-exitint3" style="background-image:url('<?= URL::base() ?>/images/pie-01.jpg')">
    
    <h1 style="color:white;">¿CÓMO LLEGAR A EXIT?</h1>
    <div class="info-map">
      <div class="col-sm-4">
        <h3>Ecovía</h3>
        <img class="bus" src="<?= URL::base() ?>/images/bus.png" />
        <ul>
          <li>Bajarse en la ESTACIÓN BENALCAZAR</li>
          <li>Cruzar a pie hacia el occidente</li>
          <li>Caminar dos cuadras hacia el norte</li>
          <li>Entrar por el pasaje El Jardín (cuchara)</li>
          <li>Caminar media cuadra </li>
        </ul>
      </div> 
      <div class="col-sm-4">
          <h3>Auto Desde el Norte</h3>
          <img class="car" src="<?= URL::base() ?>/images/carro_norte.png" />
          <ul>
            <li>Tomar la Av. 6 de Diciembre hacia el Sur en cualquier punto antes o hasta Av. Naciones Unidas</li>
            <li>Continuar hacia el sur hasta pasar los SUPERCINES</li>
            <li>Tomar la siguiente derecha en pasaje El Jardín. Disponemos de parqueaderos propios.</li>
          </ul>
      </div>
      <div class="col-sm-4">
          <h3>Auto Desde el Sur</h3>
          <img class="car" src="<?= URL::base() ?>/images/carro_sur.png" />
          <ul>
            <li>Tomar la Av. de los Shyris hasta la Av. Naciones Unidas</li>
            <li>Girar hacia la derecha en Av. Naciones Unidas hasta Av. 6 de Diciembre</li>
            <li>Tomar la Av. 6 de Diciembre hacia el Sur hasta pasar los SUPERCINES</li>
            <li>Tomar la siguiente derecha en pasaje El Jardín. Disponemos de parqueaderos propios.</li>
          </ul>
      </div>
<!--       <div style="background-color:white;" class="col-sm-12">
        <img src="<?= URL::base() ?>/images/mapa.png" />
      </div> -->
    </div>
    <div id="map"></div>
        <div id="TA_cdsratingsonlynarrow894" class="TA_cdsratingsonlynarrow" style="margin-top:1%;">
<ul id="oLh6dhYO6mFU" class="TA_links S0v7zzufw">
<li id="LcVCloyf" class="E3ec2pgOHVwH">
<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/tripadvisor_logo_transp_340x80-18034-2.png" alt="TripAdvisor"/></a>
</li>
</ul>
</div>
</section>

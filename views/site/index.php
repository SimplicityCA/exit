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
    var image = window.location.protocol + "//" + window.location.host +"/web/images/icono.svg";
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
$this->registerJs($script,View::POS_END);

AppAsset::register($this);
$this->title = 'EXIT';
?>
<!-- -->
<section id="home"  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/<?= $home->picture ?>')">
    <div class="inf-home">
        <span><?= $home->title ?>
              </span>
         <span class="second-text-home">
         <?= $home->subtitle ?>
        </span>
        <a href="#MISIONES" class="btn-menu" to_section="missions">
            <div class="btn-comprara">
                Seleccionar una misión.
            </div>
        </a>
    </div>

</section>

<section id="what-is" class="cont-exitint2" >
    <h1>Exit es un juego</h1>
        <div class="it-is-cont">
            <div class="row">
              <div class="col-sm-8">Estarás encerrado en una habitación temática y tienes 60 minutos para completar una misión y salir victorioso.</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/reloj.svg" /></div>
              <hr class="style-three"></hr>
            </div>
            <div class="row">
              <div class="col-sm-8">Deberás resolver enigmas, encontrar pistas, abrir puertas secretas, desactivar bombas y escapar.</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/21.svg" /></div>
              <hr class="style-three"></hr>
            </div>
            <div class="row">
              <div class="col-sm-8">Escapes o no, vivirás una experiencia única para compartir con amigos, compañeros y familia en equipos de 2 a 6 personas. ¿Puedes lograr que tu equipo sea el mejor?</div>
              <div class="col-sm-4"><img src="<?= URL::base() ?>/images/22.svg" /></div>
               <hr class="style-three"></hr>
            </div>
        </div>
</section>

<section id="missions"  class="background-exitint interna-exit4" style="background-image:url('<?= URL::base() ?>/images/slide1.jpg')">
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
      <div class="secc-intcolchon">
        <ul class="ventajas-<?= count($games) ?>">
        <?php foreach($games as $game): ?>
            <li>
              <a href="<?= ($game->status == 'ACTIVE') ? Url::to(['game/view','id'=>$game->id]) : 'javascript:void(0)' ?>">
                <?php if($game->status == 'INACTIVE'){ ?>
                <div class="mis-label" style="<?= ($game->status == 'INACTIVE') ? 'background:gray;' : '' ?>"><span class="mis-tit"><?= $game->title ?></span> <br/> <span class="mis-subtit"><?= $game->subtitle ?></span>
                  <?= ($game->status == 'INACTIVE') ? '<br/>PROXIMAMENTE' : '' ?>
                </div>
                 <?php } ?>
                <img src="<?= URL::base() ?>/images/game/<?= $game->picture ?>" class="img-propiedad"/>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>   
    </div>
</section>
<!-- <section class="cont-exitint2" style="background-image:url('<?= URL::base() ?>/images/13.svg')" >
    <h1 style="color:white;">ENCUÉNTRANOS</h1>
    <div id="map"></div>
</section> -->
<section id="find-us" class="cont-exitint3" style="background-image:url('<?= URL::base() ?>/images/pie-01.jpg')">
    
    <h1 style="color:white;">¿CÓMO LLEGAR A EXIT?</h1>
    <div id="map" style="width:90%;min-height:400px;margin-left:5%;"></div>
    
</section>

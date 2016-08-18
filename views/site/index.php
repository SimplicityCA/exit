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
    //var image = window.location.protocol + "//" + window.location.host +"/web/images/chaide_mapa.png";
        var mapOptions = {
          center: new google.maps.LatLng(lat,long),
          zoom: 17,
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
    //icon: image
  });
 var infowindow = new google.maps.InfoWindow({
    content: description
  });
infowindow.open(map, marker);
      }
        function location_map(lat,long) {
        var mapOptions = {
          center: new google.maps.LatLng(lat,long),
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
//          width:"100%",
//          height:"100%"
//       
        };
        var map = new google.maps.Map(document.getElementById("map"),
            mapOptions);
      }
$(document).ready(function() {
  initialize(0,0,'test');
    });
JS;
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyDkyYOwDEFs05V-KrHCsUYr_gOnJwJhvmY');
$this->registerJs($script,View::POS_END);

AppAsset::register($this);
$this->title = 'EXIT';
?>
<!-- -->
<section  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/<?= $home->picture ?>')">
    <div class="inf-home">
        <span><?= $home->title ?>
              </span>
         <span class="second-text-home">
         <?= $home->subtitle ?>
        </span>
        <a href="#">
            <div class="btn-comprara">
                Seleccionar una misión.
            </div>
        </a>
    </div>

</section>

<section class="cont-exitint2" >
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

<section  class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/mision.svg')">
    <div class="info-mis">
        <h1>MISIONES</h1>
            <div class="row">
            <span>Estarás encerrado en una habitación temática y tienes 60 minutos para completar una misión y salir victorioso. </span><br/>

<span>Deberás resolver enigmas, encontrar pistas, abrir puertas secretas, desactivar bombas y escapar.</span><br/>

<span>Escapes o no, vivirás una experiencia única para compartir con amigos, compañeros y familia en equipos de 2 a 6 personas. ¿Puedes lograr que tu equipo sea el mejor?</span><br/>
            </div>
            
                
          
    </div>
        <h1>ELIGE UNA MISIÓN</h1>
        <div class="info-mis-second">
        <span>
Para escapar debes superar todas las pruebas, no serán necesarios conocimientos previos, solo la lógica, la rapidez de reacción y el trabajo en equipo. Pase lo que pase, vivirás una experiencia ultra divertida que la recordarás por mucho tiempo.
        </span>
      </div>
      <div class="secc-intcolchon">
        <ul class="ventajas-1">
 
            <li>
                <div class="mis-label"><span class="mis-tit">Escape del Cuartel</span> <br/> <span class="mis-subtit">Real de Lima</span></div>
                <img src="<?= URL::base() ?>/images/15.svg" class="img-propiedad"/>
            </li>
          
        </ul>   
    </div>
</section>
<section class="cont-exitint2" style="background-image:url('<?= URL::base() ?>/images/13.svg')" >
    <h1 style="color:white;">ENCUÉNTRANOS</h1>
    <div id="map"></div>
</section>

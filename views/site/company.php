<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'EMPRESAS';
$this->params['breadcrumbs'][] = $this->title;
?>
<section   class="background-exitint interna-exit" style="background-image:url('<?= URL::base() ?>/images/4.svg')">
    <h1 class="contact-us-h1"><?= Html::encode($this->title) ?></h1>
    <div class="col-sm-10 col-sm-offset-1 info-company">
        <p>Los Cuartos de Escape en el mundo han demostrado ser una eficiente herramienta de recursos humanos. El formato del juego, de una manera lúdica y experimental, enseña la importancia de una correcta comunicación y del trabajo en equipo.</p> 
        <br>
        <h2>TEAM BULDING</h2>
            <ul>
                <li>Una actividad diferente: se sale de lo tradicional  y por lo tanto es más interesante y memorable.</li> 
                <li>Fomenta la integración: los participantes se darán cuenta que cada persona tiene habilidades diferentes y que todas son necesarias para lograr un objetivo.</li>
                <li>Relacionamiento: permite que personas que trabajan en distintas áreas de la empresa tengan la oportunidad de conocerse y trabajar juntos.</li>
            </ul>
            <br>
        <h2>ASSESSMENT</h2>
            <ul>
                <li>Identificación de líderes</li>
                <li>Identificación de fortalezas y debilidades</li>
                <li>Identificación de competencias: <br>
                        Capacidad analítica 
                        Pensamiento estratégico
                        Comunicación
                        Relacionamiento
                        Cooperación
                        Resolución de conflictos
                        Priorización de tareas 
                </li>
            </ul>
            <br>
        <p> 
            Disponemos de una cómoda sala de reuniones desde donde los ejecutivos de recursos humanos observarán y valorarán el comportamiento de sus equipos. 
            Esta sala puede ser utilizada para una discusión y o presentación posterior.
            Ofrecemos servicio de bebidas, catering y transporte desde y hacia las oficinas. 
        </p>  
    </div>
</section>

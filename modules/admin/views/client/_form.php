<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reserve_id')->textInput() ?>

    <?= $form->field($model, 'number_players')->textInput() ?>

    <?= $form->field($model, 'pay_method')->dropDownList([ 'PAYPAL' => 'PAYPAL', 'RESERVE' => 'RESERVE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total_price')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'PAYED' => 'PAYED', 'NOTPAYED' => 'NOTPAYED', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

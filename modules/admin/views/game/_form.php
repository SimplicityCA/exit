<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Game */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->fileInput() ?>
    <?php if($model->picture): ?>
    <?= Html::img('@web/images/game/'.$model->picture,['width'=>'30%']);?>
<?php endif; ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'landing_picture')->fileInput() ?>
    <?php if($model->landing_picture): ?>
    <?= Html::img('@web/images/game/'.$model->landing_picture,['width'=>'30%']);?>
<?php endif; ?>

    <?= $form->field($model, 'recordh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recordm')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'price_d')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

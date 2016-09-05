<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'description')->fileInput() ?>
    <?php if($model->picture): ?>
    <?= Html::img('@web/images/'.$model->description,['width'=>'30%']);?>
<?php endif; ?>

    <?= $form->field($model, 'game_id')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'WINNERT' => 'WINNERT', 'BANNER' => 'BANNER', 'WINNERM' => 'WINNERM', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

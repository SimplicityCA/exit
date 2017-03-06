<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\models\Params */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="params-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    
<?php if($model->type=='POPUP'){ ?>
    <?= $form->field($model, 'value')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'es',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>
<?php }else{ ?>
<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
<?php } ?>
<?= $form->field($model, 'status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>
<?= $form->field($model, 'game_id')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

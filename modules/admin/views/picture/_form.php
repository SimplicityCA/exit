<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Game;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\models\Picture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picture-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'description')->fileInput() ?>
    <?php if($model->description): ?>
    <?= Html::img('@web/images/'.$model->description,['width'=>'30%']);?>
<?php endif; ?>

    <?= $form->field($model, 'game_id')->dropdownList(
    Game::find()->select(['title', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Selecciona el juego']) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'WINNERT' => 'RECORD MUNDIAL', 'BANNER' => 'BANNER', 'WINNERM' => 'RECORD MENSUAL', ], ['prompt' => 'Selecciona un tipo']) ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'record')->widget(TinyMce::className(), [
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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

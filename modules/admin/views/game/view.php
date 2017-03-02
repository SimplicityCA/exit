<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Game */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php $form = ActiveForm::begin(['action' => ['weekendreserve'],'options' => ['method' => 'post']]) ?>
        <?= Html::hiddenInput('id', $model->id); ?>
        <label># de Fechas:</label>
        <?= Html::textInput('rnumber'); ?>
         <?= Html::submitButton('Asignar Fechas', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'subtitle',
            'picture',
            'description:ntext',
            'video',
            'status',
            'landing_picture',
            'recordh:ntext',
            'recordm:ntext',
            'price',
            'price_d',
            'start_time',
            'end_time',
            'duration',
            'space_time'
        ],
    ]) ?>

</div>

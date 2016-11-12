<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RevisionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revision-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cuba_id') ?>

    <?= $form->field($model, 'fecha_revision') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'valida_hasta') ?>

    <?php // echo $form->field($model, 'descripcion_proxima') ?>

    <?php // echo $form->field($model, 'autorizado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

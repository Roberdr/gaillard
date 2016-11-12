<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cuba */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'cuba')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_exterior_id')->textInput() ?>

    <?= $form->field($model, 'material_interior_id')->textInput() ?>

    <?= $form->field($model, 'fecha_compra')->textInput() ?>

    <?= $form->field($model, 'fecha_ultima_revision')->textInput() ?>

    <?= $form->field($model, 'fecha_proxima_revision')->textInput() ?>

    <?= $form->field($model, 'plataforma_id')->textInput() ?>

    <?= $form->field($model, 'longitud')->textInput() ?>

    <?= $form->field($model, 'ancho')->textInput() ?>

    <?= $form->field($model, 'alto')->textInput() ?>

    <?= $form->field($model, 'capacidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

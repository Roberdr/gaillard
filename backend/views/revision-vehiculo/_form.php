<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RevisionVehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revision-vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_vehiculo')->textInput() ?>

    <?= $form->field($model, 'id_tipo_revision')->textInput() ?>

    <?= $form->field($model, 'fecha_revision')->textInput() ?>

    <?= $form->field($model, 'detalles')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ejecutor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

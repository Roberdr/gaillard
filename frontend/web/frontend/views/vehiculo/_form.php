<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_vehiculo')->textInput() ?>

    <?= $form->field($model, 'modelo_tacografo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pma')->textInput() ?>

    <?= $form->field($model, 'tara')->textInput() ?>

    <?= $form->field($model, 'fecha_compra')->textInput() ?>

    <?= $form->field($model, 'taller_habitual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ultimo_cambio_aceite')->textInput() ?>

    <?= $form->field($model, 'ultimo_km_registrado')->textInput() ?>

    <?= $form->field($model, 'ultima_itv_efectuada')->textInput() ?>

    <?= $form->field($model, 'ultima_revision_tacografo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

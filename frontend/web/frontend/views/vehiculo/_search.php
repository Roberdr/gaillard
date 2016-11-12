<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'id_tipo_vehiculo') ?>

    <?= $form->field($model, 'modelo_tacografo') ?>

    <?php // echo $form->field($model, 'pma') ?>

    <?php // echo $form->field($model, 'tara') ?>

    <?php // echo $form->field($model, 'fecha_compra') ?>

    <?php // echo $form->field($model, 'taller_habitual') ?>

    <?php // echo $form->field($model, 'ultimo_cambio_aceite') ?>

    <?php // echo $form->field($model, 'ultimo_km_registrado') ?>

    <?php // echo $form->field($model, 'ultima_itv_efectuada') ?>

    <?php // echo $form->field($model, 'ultima_revision_tacografo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

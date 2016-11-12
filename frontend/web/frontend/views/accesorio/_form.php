<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Accesorio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accesorio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_accesorio_id')->textInput() ?>

    <?= $form->field($model, 'material_id')->textInput() ?>

    <?= $form->field($model, 'cuba_id')->textInput() ?>

    <?= $form->field($model, 'compartimento_id')->textInput() ?>

    <?= $form->field($model, 'situacion_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

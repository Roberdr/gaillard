<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 28/05/16
 * Time: 12:54
 */

use yii\bootstrap\ActiveForm;

/* @var $model common\models\Cuba */

?>

<div class="tab2-form">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]); ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'num_homologacion')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'num_fabricacion')->textInput(['readonly' => 'readonly']) ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_cuerpo')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_fondo')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'prueba_hidraulica')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'autoridad')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'presion_prueba')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'presion_servicio_ADR')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
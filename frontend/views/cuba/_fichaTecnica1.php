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
    <h1><div class="label label-primary">IMDG IDENTIFICATION PLATE</div></h1>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'pais_fabricacion')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-10">
            <?= $form->field($model, 'constructor')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'num_fabricacion')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'num_homologacion')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'fecha_construccion')->textInput([
                'readonly' => 'readonly',
                'value' => $model->fecha_construccion ? date( 'm-Y', strtotime( $model->fecha_construccion )): '',
                ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'pais_aprobacion')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'num_tipo_imo')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'autoridad')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'codigo_diseno')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'prueba_hidraulica')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'presion_servicio_ADR')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'presion_servicio_IMO')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
                <?= $form->field($model, 'presion_exterior')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'presion_tarado_valvulas')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'temperatura_calculo_referencia')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'peso_bruto')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'tara')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'peso_max_producto')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'material_exterior_id')->textInput(['value' => $model->materialExterior->material,
                'readonly' => 'readonly']);?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_cuerpo')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_fondo')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_equivalente')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'tipo_forro')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
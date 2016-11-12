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
                'value' => $model->fecha_construccion ? date( 'M-Y', strtotime( $model->fecha_construccion )): '',
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
            <?= $form->field($model, 'prueba_hidraulica', [
                //'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">bar</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->prueba_hidraulica ? yii::$app->formatter->asDate($model->prueba_hidraulica):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'presion_servicio_ADR', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">bar</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->presion_servicio_ADR ? yii::$app->formatter->asDecimal($model->presion_servicio_ADR,1):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'presion_servicio_IMO', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">bar</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->presion_servicio_IMO ? yii::$app->formatter->asDecimal($model->presion_servicio_IMO,1):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
                <?= $form->field($model, 'presion_exterior', [
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">bar</span></div>',
                    'inputOptions' => [
                        'readonly' => 'readonly',
                        'value' => $model->presion_exterior ? yii::$app->formatter->asDecimal($model->presion_exterior,1):'',
                        'style' => 'text-align: right',
                    ],
                ]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'presion_tarado_valvulas', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">bar</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->presion_tarado_valvulas ? yii::$app->formatter->asDecimal($model->presion_tarado_valvulas,1):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'temperatura_calculo_referencia', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">ºC</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
//                    'value' => $model->temperatura_calculo_referencia ? yii::$app->formatter->asInteger($model->temperatura_calculo_referencia):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'peso_bruto', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">Kg</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => yii::$app->formatter->asInteger($model->peso_bruto),
                    'style' => 'text-align: right',
                ]
            ])?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'tara', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">Kg</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => yii::$app->formatter->asInteger($model->tara),
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'peso_max_producto', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">Kg</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->peso_max_producto ? yii::$app->formatter->asInteger($model->peso_max_producto):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'material_exterior_id')->textInput(['value' => $model->materialExterior->material,
                'readonly' => 'readonly']);?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_cuerpo', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">mm</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->espesor_cuerpo ? yii::$app->formatter->asInteger($model->espesor_cuerpo):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_fondo', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">mm</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->espesor_fondo ? yii::$app->formatter->asInteger($model->espesor_fondo):'',
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'espesor_equivalente', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">mm</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                   // 'value' => $model->espesor_equivalente ? yii::$app->formatter->asInteger($model->espesor_equivalente):'' ,
                    'style' => 'text-align: right',
                ],
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'tipo_forro')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
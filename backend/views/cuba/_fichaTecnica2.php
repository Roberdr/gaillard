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
    <h1><div class="label label-primary">C.S.C. SAFETY APPROVAL</div></h1>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'num_aprobacion_CSC')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'fecha_construccion')->textInput([
                'readonly' => 'readonly',
                'value' => date( 'M-Y', strtotime( $model->fecha_construccion )),
                ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'peso_bruto', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">Kg</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => yii::$app->formatter->asInteger($model->peso_bruto),
                    'style' => 'text-align: right',
                ]
            ])?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'peso_max_apilamiento', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">Kg</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->peso_max_apilamiento ? yii::$app->formatter->asInteger($model->peso_max_apilamiento):'',
                    'style' => 'text-align: right',
                ]
            ])?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'carga_rigidez', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">Kg</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->carga_rigidez ? yii::$app->formatter->asInteger($model->carga_rigidez):'',
                    'style' => 'text-align: right',
                ]
            ])?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
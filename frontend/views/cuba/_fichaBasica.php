<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 22/05/16
 * Time: 9:44
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Material;

use kartik\select2\Select2;


/* @var $model common\models\Cuba */

?>

<div class="tab1-form">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]); ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'cuba', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">GAIU </span>{input}</div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                ],
            ]); ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'num_cuadro')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'codigo')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1">
            <?= $form->field($model, 'peso_bruto')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'tara')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'plataforma_id')->textInput(['value' => $model->plataforma->matricula?
                                                                            $model->plataforma->matricula: '',
                'readonly' => 'readonly']);?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'fecha_construccion')->textInput(['readonly' => 'readonly']) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'material_exterior_id')->textInput(['value' => $model->materialExterior->material,
                'readonly' => 'readonly']);?>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-lg-1">
            <?= $form->field($model, 'longitud')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'ancho')->textInput(['readonly' => 'readonly']) ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'alto')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'comps', [
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Detalles</button>
                                        </span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                ],
            ]); ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'capacidad')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

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
        <div class="panel panel-default col-lg-5">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'cuba', [
                            'inputTemplate' => '<div class="input-group"><span class="input-group-addon">GAIU </span>{input}</div>',
                            'inputOptions' => [
                                'readonly' => 'readonly',
                            ],
                        ]); ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'num_cuadro')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'codigo')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $form->field($model, 'peso_bruto')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'tara')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'plataforma_id')->textInput(['value' => $model->plataforma_id?
                            $model->plataforma->matricula: '',
                            'readonly' => 'readonly']);?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <?= $form->field($model, 'fecha_construccion')->textInput(['readonly' => 'readonly']) ?>
                    </div>

                    <div class="col-lg-7">
                        <?= $form->field($model, 'material_exterior_id')->textInput(['value' => $model->materialExterior->material,
                            'readonly' => 'readonly']);?>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $form->field($model, 'longitud')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'ancho')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($model, 'alto')->textInput(['readonly' => 'readonly']) ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-default col-lg-6 col-lg-offset-1">
            <div class="panel-heading">
                <h3>Número de Compartimentos</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($model->compartimentos as $c) : ?>
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-2">
                            <?= $form->field($c, 'numero')->textInput(['readonly' => 'readonly']) ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($c, 'capacidad')->textInput(['readonly' => 'readonly']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">
                       <h4>Capacidad Total: <?= $model->getCapacidad()?> litros</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

    </div>

    <?php ActiveForm::end(); ?>
</div>

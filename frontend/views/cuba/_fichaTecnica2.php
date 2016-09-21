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
            <?= $form->field($model, 'peso_bruto')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'peso_max_apilamiento')->textInput(['readonly' => 'readonly']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'carga_rigidez')->textInput(['readonly' => 'readonly']);?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
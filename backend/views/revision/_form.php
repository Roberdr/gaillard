<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;


use common\models\Cuba;


/* @var $this yii\web\View */
/* @var $model common\models\Revision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revision-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-lg-2">

            <?= $form->field($model, 'cuba_id')->widget(Select2::className(), [
                'data' => ArrayHelper::map(Cuba::find()->all(),'id', 'cuba'),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona una cuba ...', 'value' => isset($_GET['cuba_id'])? $_GET['cuba_id']:'' ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'fecha_revision')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'autorizado')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-8">
            <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'valida_hasta')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
        <div class="col-lg-10">
            <?= $form->field($model, 'descripcion_proxima')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 21/09/16
 * Time: 20:27
 */

use common\models\TipoVehiculo;


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;




/* @var $this yii\web\View */
/* @var $model common\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'id_tipo_vehiculo')->widget(Select2::className(), [
                'data' => ArrayHelper::map(TipoVehiculo::find()->all(),'id', 'tipo_vehiculo'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Tipo de vehículo ...')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'tara')->textInput() ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'pma')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'fecha_compra')->widget(
                DatePicker::className(), [
                // inline too, not bad
                //'inline' => true,
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yy-mm-dd'
                ]
            ]); ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'taller_habitual')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'modelo_tacografo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
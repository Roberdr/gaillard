<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 14/03/16
 * Time: 19:16
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;


use common\models\Cuba;
use common\models\TipoOperacion;
use common\models\Operario;


/* @var $this yii\web\View */
/* @var $model common\models\Operacion */
/* @var $form yii\widgets\ActiveForm */
/* @var $cuba_id integer */
?>

<div class="operacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cuba_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Cuba::find()->orderBy('cuba')->all(),'id', 'cuba'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona una cuba ...', 'value' => $cuba_id,],
        'pluginOptions' => [
            'allowClear' => true
        ],
        //'value' => $cuba_id,
    ]);?>

    <?= $form->field($model, 'operacion_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(TipoOperacion::find()->orderBy('operacion')->all(),'id', 'operacion'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona un trabajo ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'fecha_operacion')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operario_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Operario::find()->orderBy('nombre')->all(),'id', 'nombre'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona un operario ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
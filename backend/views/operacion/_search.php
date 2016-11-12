<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 14/03/16
 * Time: 19:18
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OperacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cuba_id') ?>

    <?= $form->field($model, 'operacion_id') ?>

    <?= $form->field($model, 'fecha_operacion') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'operario_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
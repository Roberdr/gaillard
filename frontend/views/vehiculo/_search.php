<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 21/09/16
 * Time: 20:28
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?= $form->field($model, 'id_tipo_vehiculo') ?>

    <?= $form->field($model, 'modelo_tacografo') ?>

    <?php // echo $form->field($model, 'pma') ?>

    <?php // echo $form->field($model, 'tara') ?>

    <?php // echo $form->field($model, 'fecha_compra') ?>

    <?php // echo $form->field($model, 'taller_habitual') ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
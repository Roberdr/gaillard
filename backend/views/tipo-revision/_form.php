<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 5/11/16
 * Time: 15:32
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TipoRevision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-revision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_revision')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
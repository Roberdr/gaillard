<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 26/10/16
 * Time: 23:23
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use common\models\Grupo;
use common\models\Accesorio;

/* @var $this yii\web\View */
/* @var $model common\models\AccesorioGrupo */
/* @var $form yii\widgets\ActiveForm */
/* @var $grupo_id integer */
?>

<div class="accesorio-grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grupo_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Grupo::find()->with('tipoGrupo')->all(),'id', 'tipoGrupo.nombre_grupo', 'cuba.cuba'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona un grupo ...', 'value' => $grupo_id],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'accesorio_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Accesorio::find()->with('tipoAccesorio')->all(),'id', 'listaDetalles'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona un accesorio ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
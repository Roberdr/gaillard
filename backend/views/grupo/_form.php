<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\bootstrap\Button;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

use common\models\TipoGrupo;
use common\models\Cuba;
use common\models\Compartimento;
use common\models\Situacion;

/* @var $this yii\web\View */
/* @var $model common\models\Grupo */
/* @var $form yii\widgets\ActiveForm */
/* @var $cuba_id integer */

?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">

            <?= $form->field($model, 'tipo_grupo_id')->widget(Select2::className(), [
                'data' => ArrayHelper::map(TipoGrupo::find()->orderBy('nombre_grupo')->all(),'id', 'nombre_grupo'),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona un grupo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
        <div class="col-lg-4">
            <?= Button::widget([
                'label' => Yii::t('app','Nuevo Tipo de Grupo'),
                'options' => ['class' => 'btn btn-lg btn-success', 'href' => Url::to('/tipo-grupo/create')],
                'id' => 'btn-nuevo',
            ]); ?>
        </div>

    </div>

    <?php Modal::begin([
        'header' => '<h4>Tipos de grupo</h4>',
        'headerOptions' => ['id' => 'modalHeader'],
        'id' => 'modal-tipo_grupo',
        'size' => 'modal-lg',
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
       // 'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>

    <?= $form->field($model, 'cuba_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Cuba::find()->orderBy('cuba')->all(),'id', 'cuba'),
        'id' => 'campoCuba',
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona una cuba ...', 'value' => $cuba_id/*, 'disabled'=> 'disabled'*/],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'compartimento_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Compartimento::find()->orderBy('numero')->all(),'id', 'numero', 'cuba.cuba'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona un compartimento ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'situacion_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Situacion::find()->orderBy('situacion_lado_letra')->all(),'id', 'situacion_lado_letra'),
        'language' => 'es',
        'options' => ['placeholder' => 'Selecciona una situación ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

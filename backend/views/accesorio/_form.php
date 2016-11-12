<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 25/09/16
 * Time: 11:19
 */

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\widgets\Pjax;


use common\models\Material;
use common\models\TipoAccesorio;
use common\models\CaracteristicaAccesorio;
use \common\models\Unidad;




/* @var $this yii\web\View */
/* @var $model common\models\Accesorio */
/* @var $modelsDetalle[] common\models\DetalleAccesorio */
/* @var $accesorioGrupo \common\models\AccesorioGrupo */
/* @var $grupo \common\models\Grupo */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="accesorio-form">

    <?php Pjax::begin(); ?>
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'tipo_accesorio_id')->widget(Select2::className(), [
                    'data' => ArrayHelper::map(TipoAccesorio::find()->orderBy('tipo_accesorio')->all(),'id', 'tipo_accesorio'),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona un tipo de accesorio ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'material_id')->widget(Select2::className(), [
                    'data' => ArrayHelper::map(Material::find()->orderBy('material')->all(),'id', 'material'),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona un material ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
            <div class="col-lg-5">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-3">
            </div>
        </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <?php echo Yii::t('app', 'DETALLES DEL ACCESORIO'); ?>
            </h4>
        </div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsDetalle[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id',
                    'accesorio_id',
                    'cantidad',
                    'caracteristica_accesorio_id',
                    'medida',
                    'unidad_id',
                    'tipo',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetBody -->
                <?php foreach ($modelsDetalle as $i => $modelDetalle): ?>
                    <div class="item "><!-- widgetItem -->
                        <?php
/*                        // necessary for update action.
                        if (! $modelDetalle->isNewRecord) {
                            echo Html::activeHiddenInput($modelDetalle, "[{$i}]id");
                        }
                        */?>

                        <div class="row">
                            <div class="col-sm-1">
                                <?= $form->field($modelDetalle, "[{$i}]cantidad")->textInput() ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDetalle, "[{$i}]caracteristica_accesorio_id")->widget(Select2::className(), [
                                    'data' => ArrayHelper::map(CaracteristicaAccesorio::find()->all(),'id', 'caracteristica_accesorio'),
                                    'language' => 'es',
                                    'options' => ['placeholder' => 'Selecciona una característica ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]);?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelDetalle, "[{$i}]medida")->textInput() ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDetalle, "[{$i}]unidad_id")->widget(Select2::className(), [
                                    'data' => ArrayHelper::map(Unidad::find()->all(),'id', 'unidad'),
                                    'language' => 'es',
                                    'options' => ['placeholder' => 'Selecciona una unidad ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]);?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelDetalle, "[{$i}]tipo")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-1 pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs text-center"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- .row -->
                    </div>
                <?php endforeach; ?>
            </div>
                <?php DynamicFormWidget::end(); ?>
        </div>
    </div><!-- .panel -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>
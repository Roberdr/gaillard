<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 13/03/16
 * Time: 19:44
 */

//use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\Material;
use common\models\Plataforma;
use common\models\Producto;

use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

//use frontend\assets\CustomAsset;
//CustomAsset::register($this);


/* @var $this yii\web\View */
/* @var $modelCuba common\models\Cuba */
/* @var $modelsCompartimento[] common\models\Compartimento */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cuba-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>



    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($modelCuba, 'cuba', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">GAIU </span>{input}</div>',
            ]); ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($modelCuba, 'num_cuadro')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($modelCuba, 'codigo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($modelCuba, 'peso_bruto')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($modelCuba, 'tara')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($modelCuba, 'material_exterior_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map(Material::find()->all(),'id', 'material'),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un material ...'],
            'pluginOptions' => [
            'allowClear' => true
            ],
            ]);?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                Compartimentos
            </h4>
        </div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 3, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsCompartimento[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'numero',
                    'capacidad',
                    'producto_id',
                    'material_interior_id',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetBody -->
                <?php foreach ($modelsCompartimento as $i => $modelCompartimento): ?>
                    <div class="item "><!-- widgetItem -->
                            <?php
                            // necessary for update action.
                            if (! $modelCompartimento->isNewRecord) {
                                echo Html::activeHiddenInput($modelCompartimento, "[{$i}]id");
                            }
                            ?>

                            <div class="row">
                                <div class="col-sm-2">
                                    <?= $form->field($modelCompartimento, "[{$i}]numero")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($modelCompartimento, "[{$i}]capacidad", ["template" => "<label>Capacidad (l)</label>\n{input}\n{hint}\n{error}"])->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($modelCompartimento, "[{$i}]producto_id")->widget(Select2::className(), [
                                        'data' => ArrayHelper::map(Producto::find()->all(),'id', 'producto'),
                                        'language' => 'es',
                                        'options' => ['placeholder' => 'Selecciona una producto ...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($modelCompartimento, "[{$i}]material_interior_id")->widget(Select2::className(), [
                                        'data' => ArrayHelper::map(Material::find()->all(),'id', 'material'),
                                        'language' => 'es',
                                        'options' => ['placeholder' => 'Selecciona una material ...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);?>
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
    

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($modelCuba, 'fecha_construccion')->widget(
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
        <div class="col-lg-2">
            <?= $form->field($modelCuba, 'plataforma_id')->widget(Select2::className(), [
                'data' => ArrayHelper::map(Plataforma::find()->all(),'id', 'matricula'),
                'language' => 'es',
                'options' => ['placeholder' => 'Selecciona una plataforma ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($modelCuba, 'longitud')->textInput() ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($modelCuba, 'ancho')->textInput() ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($modelCuba, 'alto')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($modelCuba, 'portadocumentos')->checkbox([
                //'template' => '{label}{input}',
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($modelCuba, 'portaplacas')->checkbox([
                //'template' => '{label}{input}',
            ]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($modelCuba, 'portamangueras')->checkbox([
                //'template' => '{label}{input}',
            ]) ?>
        </div>

    </div>



    <div class="form-group">
        <?= Html::submitButton($modelCuba->isNewRecord ? 'Create' : 'Update', ['class' => $modelCuba->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
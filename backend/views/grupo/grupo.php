<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 31/10/16
 * Time: 20:37
 */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Grupo */
/* @var $accesorios common\models\Accesorio */
/* @var $nextID integer */
/* @var $prevID integer */
/* @var $disableNext string */
/* @var $disablePrev string */

$this->title = $model->tipoGrupo->nombre_grupo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-grupo">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]); ?>
    
    <div class="row">
        <div class="col-lg-1">
            <?=  Html::a('<i class="glyphicon glyphicon-menu-left"></i> Anterior', ['grupo', 'id' => $prevID], ['class' => 'btn btn-primary r-align btn-lg '.$disablePrev]) ?>
        </div>
        <div class="col-lg-5 col-lg-offset-2">
            <?= $form->field($model, 'tipo_grupo_id', [
                //'inputTemplate' => '<div class="input">{input}</div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->tipoGrupo->nombre_grupo,
                    'style' => "font-size: 40px; height: 60px;",
                ],
            ])?>
        </div>
        <div class="col-lg-1 col-lg-offset-2">
            <?= Html::a('Siguiente <i class="glyphicon glyphicon-menu-right"></i>', ['grupo', 'id' => $nextID], ['class' => 'btn btn-primary r-align btn-lg '.$disableNext]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1">
            <?= $form->field($model, 'cuba_id', [
                //'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">mm</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->cuba->cuba,
                    'style' => "font-size: 30px; height: 50px;",
                ],
            ])?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'compartimento_id', [
                //'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">mm</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->compartimento->numero,
                    'style' => "font-size: 30px; height: 50px;",
                ],
            ])?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'situacion_id', [
                //'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">mm</span></div>',
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->situacion->situacion_lado_letra,
                    'style' => "font-size: 30px; height: 50px;",
                ],
            ])?>
        </div>
    </div>

    <hr>             <!--        linea de separación-->

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="col-lg-offset-1">
            <h2>Accesorios</h2>
        </div>

        <?php foreach ($model->accesorios as $indexAccesorio => $accesorio) : ?>
            <div class="panel panel-default col-lg-8 col-lg-offset-1">
            <div class="panel-heading" role="tab" id="<?= "heading$indexAccesorio"?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="<?= "#collapse$indexAccesorio"?>" aria-expanded="true" aria-controls="collapseOne">
                        <?= $accesorio->tipoAccesorio->tipo_accesorio .
                        " ---->  Material: " .
                        $accesorio->material->material?>
                    </a>
                </h4>
            </div>
            <div id="<?= "collapse$indexAccesorio"?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?= "heading$indexAccesorio"?>">
                <div class="panel-body">
                    <?php  foreach ($accesorio->detalleAccesorio as $detalle):  ?>
                        <div class="row">
                            <div class="col-lg-1">
                                <?= $detalle->cantidad ?>
                            </div>
                            <div class="col-lg-3">
                                <?= $detalle->caracteristicaAccesorio->caracteristica_accesorio ?>
                            </div>
                            <div class="col-lg-1">
                                <?= $detalle->medida ?>
                            </div>
                            <div class="col-lg-1">
                                <?= $detalle->unidad->unidad ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>

<div class="col-lg-12">
    <hr>             <!--        linea de separación-->
</div>
<div class="col-lg-12">
<?=
Html::a(Yii::t('app', 'Nuevo accesorio'), ["/accesorio-grupo/create", 'grupo_id' => $model->id], ['class'=>'btn btn-success'])
?>
</div>

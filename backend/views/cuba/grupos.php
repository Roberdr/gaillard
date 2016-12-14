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
/* @var $model common\models\Cuba */
/* @var $grupos common\models\Grupo */
/* @var $nextID integer */
/* @var $prevID integer */
/* @var $disableNext string */
/* @var $disablePrev string */

$this->title = $model->cuba;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cubas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-grupos">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]); ?>
    
    <div class="row">
        <div class="col-lg-1">
            <?=  Html::a('<i class="glyphicon glyphicon-menu-left"></i> Anterior', ['grupos', 'id' => $prevID], ['class' => 'btn btn-primary r-align btn-lg '.$disablePrev]) ?>
        </div>
        <div class="col-lg-5 col-lg-offset-2">
            <?= $form->field($model, 'id', [
                'inputTemplate' => '<div class="input">{input}</div>',
                /*'labelOptions' => [
                    'innerHtml' => 'Cuba',
                ],*/
                'inputOptions' => [
                    'readonly' => 'readonly',
                    'value' => $model->cuba,
                    'style' => "font-size: 40px; height: 60px;",
                ],
            ])?>
        </div>
        <div class="col-lg-1 col-lg-offset-2">
            <?= Html::a('Siguiente <i class="glyphicon glyphicon-menu-right"></i>', ['grupos', 'id' => $nextID], ['class' => 'btn btn-primary r-align btn-lg '.$disableNext]) ?>
        </div>
    </div>

</div>

    <hr>             <!--        linea de separación-->

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
        <div class="col-lg-offset-1">
            <h2>Grupos</h2>
        </div>

        <?php foreach ($grupos as $idxG => $grupo) : ?>
            <div class="panel panel-primary col-lg-8 col-lg-offset-1">
                <div class="panel-heading" role="tab" id="<?= "heading$idxG"?>">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="<?= "#collapse$idxG"?>"
                           aria-expanded="true" aria-controls="<?= "collapse$idxG"?>">
                            <?= $grupo->tipoGrupo->nombre_grupo . ' -----> ' .
                            $grupo->situacion->situacion_lado_letra?>
                        </a>
                    </h4>
                </div>
                <div id="<?= "collapse$idxG"?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?= "heading$idxG"?>">
                    <div class="panel-body">

                        <!-- modificaciones -->
                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="false">
                            <?php  foreach ($grupo->accesorios as $idxA => $accesorio):  ?>
                                <div class="panel panel-primary col-lg-8 col-lg-offset-1">
                                    <div class="panel-heading" role="tab" id="<?= "heading$idxG"."$idxA"?>">
                                        <h4 class="panel-title">

                                            <a role="button" data-toggle="collapse" data-parent="#accordion2"
                                               href="<?= "#collapse2$idxG"."$idxA"?>" aria-expanded="true"
                                               aria-controls="<?= "collapse2$idxG"."$idxA"?>">

                                                <?= $accesorio->tipoAccesorio->tipo_accesorio ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?= "collapse2$idxG"."$idxA"?>" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="<?= "heading$idxG"."$idxA"?>">

                                        <div class="panel-body">
                                            <?php  foreach ($accesorio->detalleAccesorio as $indexDetalle => $detalle):  ?>
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <?=  $detalle->cantidad ?>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <?=  $detalle->caracteristicaAccesorio->caracteristica_accesorio ?>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <?=  $detalle->medida ?>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <?=  $detalle->unidad->unidad ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

        <?php ActiveForm::end(); ?>

<div class="col-lg-12">
    <hr>             <!--        linea de separación-->
</div>
<div class="col-lg-offset-2 col-lg-12">
<?=
Html::a(Yii::t('app', 'Nuevo grupo'), ["/grupo/create", 'cuba_id' => $model->id], ['class'=>'btn btn-success'])
?>
</div>

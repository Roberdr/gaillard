<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 2/11/16
 * Time: 22:18
 */

use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Cuba */
/* @var $grupos common\models\Grupo */


?>

<div class="cuba-grupo">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
    ]); ?>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="col-lg-offset-1">
            <h2>Grupos</h2>
        </div>

        <?php $c = 0; ?>
        <?php foreach ($grupos[0]->accesorios as  $i => $grupo) : ?>
            <?php $c = $c + 1; ?>
            <?= var_dump($grupo[$c])?>
            <div class="panel panel-default col-lg-8 col-lg-offset-1">
                <div class="panel-heading" role="tab" id="<?= "heading$c"?>">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="<?= "#collapse$c"?>" aria-expanded="true" aria-controls="collapseOne">
                            <?/*= $grupo->tipo_grupo_id */?>
                        </a>
                    </h4>
                </div>
                <div id="<?/*= "collapse$indexGrupo"*/?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?/*= "heading$indexGrupo"*/?>">
                    <div class="panel-body">
                        <?php /* foreach ($grupo->accesorios as $accesorio):  */?>
                            <div class="row">
                                <div class="col-lg-1">
                                    <?/*= $accesorio->tipoAccesorio->tipo_accesorio */?>
                                </div>
                                <div class="col-lg-3">
                                    <?/*= $accesorio->material->material */?>
                                </div>
                            </div>
                        <?php /*endforeach; */?>
                    </div>
                </div>
            </div>-->
        <?php endforeach; ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
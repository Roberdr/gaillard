<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 8/11/16
 * Time: 16:53
 */

use kartik\widgets\SideNav;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $cubas \common\models\Cuba */
/* @var $grupos common\models\Grupo */

?>

<div class="cuba-grupos">
    <div class="row">
        <div class="col-lg-2 sidebar">


            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div <!--class="col-lg-offset-1-->">
                    <h2>Cubas</h2>
                </div>

                <?php foreach ($cubas as $i => $cuba) : ?>
                    <div class="panel panel-default col-lg-8">
                        <div class="panel-heading" role="tab" id="<?= "heading$i"?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="<?= "#collapse$i"?>" aria-expanded="true" aria-controls="collapseOne">
                                    <?= $cuba->cuba?>
                                </a>
                            </h4>
                        </div>
                        <div id="<?= "collapse$i"?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?= "heading$i"?>">
                            <div class="panel-body">
                                <?php  foreach ($cuba->grupos as $grupo):  ?>
                                    <div class="col-lg-8">
                                        <?=  Html::a($grupo->tipoGrupo->nombre_grupo, ['/grupo/grupo', 'id' => $grupo->id], ['class' => 'btn btn-primary r-align btn-lg']) ?>
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
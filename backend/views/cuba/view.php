<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 13/03/16
 * Time: 19:50
 */

use yii\helpers\Html;
use yii\bootstrap\Tabs;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cuba */
/* @var $revision common\models\Revision */
/* @var $operacion common\models\Operacion */
/* @var $accesorio common\models\AccesorioGrupo */
/* @var $fotos string */
/* @var $nextID integer */
/* @var $prevID integer */
/* @var $disableNext string */
/* @var $disablePrev string */

$this->title = 'GAIU ' . $model->cuba;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cubas') , 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-view">

    <div class="row">
        <div class="col-lg-1">
            <?=  Html::a('<i class="glyphicon glyphicon-menu-left"></i> Anterior',
                ['cuba/view', 'id' => $prevID],
                [
                    'class' => 'btn btn-primary r-align btn-lg '.$disablePrev,
                    'id' => 'btn_prev_cuba',
                ]) ?>
        </div>
        <div class="btn btn-primary btn-lg col-lg-5 col-lg-offset-2">
            <h1><?= Html::encode($this->title)  ?>
                <span style="border: double"><?= Html::encode($model->num_cuadro)  ?></span>
            </h1>

        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-1 col-lg-offset-2">
            <?= Html::a('Siguiente <i class="glyphicon glyphicon-menu-right"></i>',
                ['cuba/view', 'id' => $nextID],
                [
                    'class' => 'btn btn-primary r-align btn-lg '.$disableNext,
                    'id' => 'btn_next_cuba',
                ]) ?>
        </div>
    </div>
    <?= Tabs::widget([
        'items' => [
            [
                'label' => Yii::t('app', 'Ficha Básica'),
                'content' => $this->render('_fichaBasica', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'tab_fichaBasica'],
            ],
            [
                'label' => Yii::t('app', 'Ficha IMDG'),
                'content' => $this->render('_fichaTecnica1', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'tab_fichaTecnica1'],
            ],
            [
                'label' => Yii::t('app', 'Ficha CSC'),
                'content' => $this->render('_fichaTecnica2', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'tab_fichaTecnica2'],
            ],
            [
                'label' => Yii::t('app', 'Inspecciones oficiales'),
                'content'=> $this->render('_inspecOficiales', ['model' => $model, 'revision' => $revision]),
                'options' => ['id' => 'tab_inspeccionesOficiales'],
            ],
            [
                'label' => Yii::t('app', 'Operaciones de mantenimiento'),
                'content'=> $this->render('_operacionesMantenimiento',
                    ['model' => $model, 'operacion' => $operacion]),
                'options' => ['id' => 'tab_operacionesMantenimiento'],
            ],
            [
                'label' => Yii::t('app', 'Grupos de Accesorios'),
                'content'=> $this->render('_accesorio',
                    ['model' => $model, 'accesorio' => $accesorio]),
                //'active' => true,
                'options' => ['id' => 'tab_accesorios'],
            ],
            [
                'label' => Yii::t('app', 'Imágenes'),
                'content'=> $this->render('_imagen',
                    ['fotos' => $fotos]),
                //'active' => true,
                'options' => ['id' => 'tab_imagenes'],
            ],
        ],
    ]) ?>

</div>
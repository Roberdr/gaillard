<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 20/09/16
 * Time: 21:48
 */

use kartik\grid\GridView;
use kartik\helpers\Html;
use yii\helpers\Url;

/* @var $model common\models\Cuba */
/* @var $accesorio common\models\AccesorioGrupo */

?>

<div class="tab3-form">
    <?= GridView::widget([
        'dataProvider' => $accesorio,
        'layout' => "{items}{pager}",
        'responsive'=>true,
        'hover'=>true,
        'export' => false,
        //'bordered' => false,
        'condensed' => true,
        'floatHeader'=>true,
        //'resizableColumns'=>true,
        'panel' => [
            'heading'=> '<h2 class="panel-title"><i class="glyphicon glyphicon-cog"></i> Accesorios</h2>',
            'type'=>'success',
            'before' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo grupo', ['/grupo/create', 'cuba_id' => $model->id], ['class' => 'btn btn-success'])
                . " " .
                Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo accesorio', ['/accesorio/create'], ['class' => 'btn btn-success']),

            //'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['#'], ['class' => 'btn btn-info']),
            //'footer'=>true,
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
            //'beforeGrid'=>'My fancy content before.',
            //'afterGrid'=>'My fancy content after.',
        ],
        'columns' => [
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'width'=>'50px',
                'value'=>function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'expandOneOnly'=>true,
                'detailUrl' => Url::to(['/accesorio/detalle']),
            ],
            [
                'attribute' => 'grupo_id',
                'label' => 'Grupo',
                'value' => 'grupo.tipoGrupo.nombre_grupo',
                'group' => true,
            ],
            [
                'attribute' => 'situacion_id',
                'label' => 'Situación',
                'value' => 'grupo.situacion.situacion_lado_letra',
                'group' => true,
                'subGroupOf' => 1,

            ],
            [
                'attribute' => 'cantidad',
                'label' => 'Cantidad',
                'value' => 'cantidad',
            ],
            [
                //'attribute' => 'accesorios.accesorio_id',
                'label' => 'Accesorio',
                'value' => 'accesorio.tipoAccesorio.tipo_accesorio',
            ],
            [
                //'attribute' => 'accesorios.material_id',
                'label' => 'Material',
                'value' => 'accesorio.material.material',
            ],
        ]
    ]);
    ?>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 25/09/16
 * Time: 11:17
 */

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Accesorios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accesorio-index_grupo">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Accesorio'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Crear Grupo'), ['/grupo/create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?= GridView::widget([
            'export' => false,
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'class'=>'kartik\grid\ExpandRowColumn',
                    'width'=>'50px',
                    'value'=>function ($model, $key, $index, $column) {
                        return GridView::ROW_COLLAPSED;
                    },
                    'headerOptions'=>['class'=>'kartik-sheet-style'],
                    'expandOneOnly'=>true,
                    'detailUrl' => Url::to(["/accesorio/detalle"/*, 'id' => $data['accesorio_id']*/]),
                ],
                'grupo_id',
                [
                    'attribute' => 'grupo_id',
                    'label' => 'Grupo',
                    'value' => 'grupo.tipoGrupo.nombre_grupo',
                    /*'group' => true,*/
                ],
                [
                    'attribute' => 'cuba_id',
                    'label' => 'Cuba',
                    'value' => 'grupo.cuba.cuba',
                   /* 'group' => true,
                    'subGroupOf' => 1,*/
                ],
                [
                    'attribute' => 'situacion_id',
                    'label' => 'Situación',
                    'value' => 'grupo.situacion.situacion_lado_letra',
                    /*'group' => true,
                    'subGroupOf' => 2,*/
                ],
                'accesorio_id',
                [
                    'attribute' => 'accesorio_id',
                    'label' => 'Accesorio',
                    'value' => 'accesorio.tipoAccesorio.tipo_accesorio',
                ],
                [
                    'attribute' => 'material_id',
                    'value' => 'accesorio.material.material',
                ],
                'cantidad',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = 'view?id=' . $model['accesorio_id'];
                            return $url;
                        }
                        return null;
                    },
                ],
            ],
        ]); ?>
</div>
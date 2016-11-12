<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 2/10/16
 * Time: 19:47
*/

use yii\grid\GridView;


/* @var $model common\models\DetalleAccesorio */

?>
<div class="row">
    <div class="col-lg-2 kv-align-center">
        <h3>Características</h3>
    </div>
    <div class="col-lg-4">
        <?= GridView::widget([
            //'export' => false,
            'layout' => "{items}",
            'emptyCell' => '',
            'formatter' => Yii::$app->formatter,
            'showHeader' => false,
            'tableOptions' => ['class' => 'table table-condensed', 'style' => 'width:400px; margin-left:500px'],
            'rowOptions' => ['style' => 'width:300px'],
            'dataProvider' => $model,
            'columns' => [
                'cantidad',
                [
                    'attribute' => 'caracteristica_accesorio_id',
                    'value' => 'caracteristicaAccesorio.caracteristica_accesorio',
                ],
                [
                    'attribute' => 'medida',
                    'value' => 'medida',
                    'format' => 'decimal',
                    'contentOptions' => ['style' => 'text-align: right']
                ],
                [
                    'attribute' => 'unidad_id',
                    'value' => 'unidad.unidad',
                ],
                'tipo',
            ]

        ]);?>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 12/10/16
 * Time: 14:54
 */

/* @var $detalleAccesorio \common\models\Accesorio */

    GridView::widget([
        'dataProvider' => $detalleAccesorio,
        'columns' => [
            'cantidad',
            [
                'attribute' => 'caracteristica_accesorio_id',
                'value' => 'caracteristicaAccesorio.caracteristica_accesorio',
            ],
            'medida',
            [
                'attribute' => 'unidad_id',
                'value' => 'unidad.unidad',
            ],
            'tipo',
        ]
    ])
?>
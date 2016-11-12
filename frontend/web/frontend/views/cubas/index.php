<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cubas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cuba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cuba',
            'material_exterior_id',
            'material_interior_id',
            'fecha_compra',
            // 'fecha_ultima_revision',
            // 'fecha_proxima_revision',
            // 'plataforma_id',
            // 'longitud',
            // 'ancho',
            // 'alto',
            // 'capacidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

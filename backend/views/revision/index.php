<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RevisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Revisiones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revision-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Revisión'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'cuba_id',
                'value' => 'cuba.cuba',
            ],

            'fecha_revision',
            'descripcion:ntext',
            'valida_hasta',
            // 'descripcion_proxima:ntext',
            // 'autorizado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cuba */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cubas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cuba',
            'material_exterior_id',
            'material_interior_id',
            'fecha_compra',
            'fecha_ultima_revision',
            'fecha_proxima_revision',
            'plataforma_id',
            'longitud',
            'ancho',
            'alto',
            'capacidad',
        ],
    ]) ?>

</div>

<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 25/09/16
 * Time: 11:21
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Accesorio */
/* @var $detalleAccesorio common\models\DetalleAccesorio */

$this->title = $model->tipoAccesorio->tipo_accesorio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesorios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accesorio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= $this->render('_detalle_accesorio', [
        'detalleAccesorio' => $detalleAccesorio,
    ]); ?>

</div>
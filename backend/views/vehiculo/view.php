<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 21/09/16
 * Time: 20:30
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vehiculo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehículos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Está seguro de querer borrar el registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'marca',
            'modelo',
            'tipoVehiculo.tipo_vehiculo',
            'modelo_tacografo',
            'pma',
            'tara',
            'fecha_compra',
            'taller_habitual',
        ],
    ]) ?>

</div>
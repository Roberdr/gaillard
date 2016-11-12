<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 21/09/16
 * Time: 20:29
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vehículos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Vehículo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                'marca',
                'modelo',
                [
                    'attribute' => 'id_tipo_vehiculo',
                    'value' => 'tipoVehiculo.tipo_vehiculo',
                ],
                [
                    'attribute' => 'pma',
                    'contentOptions' =>  [
                        'style' => 'text-align:center;'
                    ],
                    'format' => 'integer',
                    'value' => 'pma',
                    'label' => 'PMA (KG)',
                ],
                [
                    'attribute' => 'tara',
                    'contentOptions' =>  [
                        'style' => 'text-align:center;'
                    ],
                    'format' => 'integer',
                    'value' => 'tara',
                    'label' => 'TARA (KG)',
                ],
                'modelo_tacografo',
                // 'fecha_compra',
                // 'taller_habitual',
    
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?></div>
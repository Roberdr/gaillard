<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 13/03/16
 * Time: 19:48
 */

use yii\helpers\Html;
use yii\grid\GridView;

use dosamigos\datepicker\DatePicker;  //Calendario
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel common\models\CubaSearch */

$this->title = 'Cubas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Cuba'), ['/cuba/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'cuba',
                'num_cuadro',
                'nombreMaterial',
                'comps',
                'capacidad',

                /*[
                    'attribute' => 'fecha_construccion',
                    'value' => 'fecha_construccion',
                    'format' => 'raw',
                    'filter' => DatePicker::widget([
                        'model' => $dataProvider,
                        'attribute' => 'fecha_construccion',
                        //'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]),
                ], */
                'matriculaPlat',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>

</div>
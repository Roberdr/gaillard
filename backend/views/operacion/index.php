<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 14/03/16
 * Time: 19:18
 */

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;  //Calendario


/* @var $this yii\web\View */
/* @var $searchModel common\models\OperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operaciones de Mantenimiento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Operación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
               'cubaNum',
                'nombreOperacion',
                [
                    'attribute' => 'fecha_operacion',
                    'value' => 'fecha_operacion',
                    'format' => 'raw',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'fecha_operacion',
                        //'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]),
                ],
                'descripcion:ntext',
                'nombreOperario',
    
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>

</div>
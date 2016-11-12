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
/* @var $array yii\db\ActiveQuery */

$this->title = 'Cubas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-prueba">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Cuba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                'cuba',
                [
                    'attribute' => 'material_exterior_id',
                    'value' => 'materialExterior.material',
                ],
                [
                    //attribute' => 'compartimentos'
                    'value' => function ($data){
                        $cap = 0;
                        foreach ($data->compartimentos as $comp){
                            $cap += $comp->capacidad;
                        };

                        return $cap;
                    },
                ],

                [
                    'attribute' => 'fecha_compra',
                    'value' => 'fecha_compra',
                    'format' => 'date',
                    /*'filter' => DatePicker::widget([
                        'model' => $dataProvider,
                        'attribute' => 'fecha_compra',
                        //'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]),*/
                ],
                // 'fecha_ultima_revision',
                // 'fecha_proxima_revision',*/
                [
                    'attribute' => 'plataforma_id',
                    'value' => 'plataforma.matricula',
                ],
                // 'longitud',
                // 'ancho',
                // 'alto',
                // 'capacidad',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end();  ?>

</div>
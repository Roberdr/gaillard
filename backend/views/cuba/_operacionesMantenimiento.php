<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 20/09/16
 * Time: 21:48
 */

use yii\grid\GridView;
use yii\bootstrap\Button;
use yii\helpers\Url;
use yii\bootstrap\Html;

/* @var $model common\models\Cuba */
/* @var $operacion[] common\models\Operacion */

?>

<div class="tab3-form">
    <?= GridView::widget([
        'dataProvider' => $operacion,
        'layout' => "{items}{pager}",
        'columns' => [
            'fecha_operacion',
            [
                'attribute' => 'operacion_id',
                'value' => 'tipoOperacion.operacion',
            ],
            [
                'attribute' => 'operario_id',
                'value' => 'operario.nombre',
            ],
            'descripcion',
        ],
    ]);
    ?>

    <?=/*= Button::widget([
        'label' => Yii::t('app', 'Crear nueva operación de mantenimiento'),
        'options' => ['class' => 'btn btn-lg btn-primary', 'href' => Url::to(["operacion/create"])],

    ]); */
    Html::a(Yii::t('app', 'Crear nueva operación de mantenimiento'), ["operacion/create", 'cuba_id' => $model->id], ['class'=>'btn btn-success'])
    ?>


</div>
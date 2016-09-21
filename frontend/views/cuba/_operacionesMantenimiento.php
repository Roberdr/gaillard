<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 20/09/16
 * Time: 21:48
 */

use yii\grid\GridView;

/* @var $model common\models\Cuba */
/* @var $operacion[] common\models\Operacion */

?>

<div class="tab3-form">
    <?= GridView::widget([
        'dataProvider' => $operacion,
        'layout' => "{items}{pager}",
        'columns' => [
            'fecha_operacion',
            'operario.nombre',
            'descripcion',
        ],
    ]);
    ?>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 29/05/16
 * Time: 10:58
 */

use yii\grid\GridView;
use yii\bootstrap\Html;

/* @var $model common\models\Cuba */
/* @var $revision[] common\models\Revision */

?>

<div class="tab3-form">
    <?= GridView::widget([
        'dataProvider' => $revision,
        'layout' => "{items}{pager}",
        'formatter' => Yii::$app->formatter,
    'columns' => [
        'fecha_revision:date',
        'autorizado',
        'descripcion',
        'valida_hasta:date',
         ],
     ]);
    ?>

    <?=    Html::a(Yii::t('app', 'Crear nueva revisión oficial'), ["revision/create", 'cuba_id' => $model->id], ['class'=>'btn btn-success']) ?>
</div>
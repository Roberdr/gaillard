<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 29/05/16
 * Time: 10:58
 */

use yii\grid\GridView;

/* @var $model common\models\Cuba */
/* @var $revision[] common\models\Revision */

?>

<div class="tab3-form">
    <?= GridView::widget([
        'dataProvider' => $revision,
        'layout' => "{items}{pager}",
    'columns' => [
        'fecha_revision',
        'autorizado',
        'descripcion',
         ],
     ]);
    ?>
</div>
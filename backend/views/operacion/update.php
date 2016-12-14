<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 14/03/16
 * Time: 19:19
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Operacion */
/* @var $cuba_id integer */


$this->title = 'Actualizar Operación de Mantenimiento: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="operacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cuba_id' => $cuba_id,
    ]) ?>

</div>
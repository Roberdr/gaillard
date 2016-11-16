<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 25/09/16
 * Time: 11:21
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Accesorio */
/* @var $accesorioGrupo \common\models\AccesorioGrupo */
/* @var $modelsDetalle common\models\DetalleAccesorio */

$this->title = Yii::t('app', 'Actualizar ');
//$this->title2 = $model->tipoAccesorio->tipo_accesorio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesorios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="accesorio-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title)?> <small> <?=Html::encode($model->tipoAccesorio->tipo_accesorio)?></small> </h1>
    </div>


    <?= $this->render('_form', [
        'model' => $model,
        //'accesorioGrupo' => $accesorioGrupo,
        'modelsDetalle' => $modelsDetalle,
    ]) ?>

</div>
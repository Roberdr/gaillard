<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 24/10/16
 * Time: 20:13
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoGrupo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Tipo Grupo',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
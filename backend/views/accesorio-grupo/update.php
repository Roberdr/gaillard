<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 26/10/16
 * Time: 23:23
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AccesorioGrupo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Accesorio Grupo',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesorio Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="accesorio-grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
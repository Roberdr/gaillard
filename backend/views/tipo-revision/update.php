<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 5/11/16
 * Time: 15:33
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoRevision */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Tipo Revision',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Revisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-revision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
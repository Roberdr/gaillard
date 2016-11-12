<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RevisionVehiculo */

$this->title = Yii::t('app', 'Create Revision Vehiculo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Revision Vehiculos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revision-vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

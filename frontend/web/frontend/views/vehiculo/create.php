<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vehiculo */

$this->title = Yii::t('app', 'Create Vehiculo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehiculos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

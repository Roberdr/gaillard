<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Revision */

$this->title = Yii::t('app', 'Nueva Revisión Oficial' );
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Revisiones Oficiales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

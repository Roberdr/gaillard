<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Cuba */

$this->title = 'Create Cuba';
$this->params['breadcrumbs'][] = ['label' => 'Cubas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

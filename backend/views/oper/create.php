<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Oper */

$this->title = 'Create Oper';
$this->params['breadcrumbs'][] = ['label' => 'Opers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

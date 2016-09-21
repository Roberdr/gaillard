<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Operacion */

$this->title = 'Create Operacion';
$this->params['breadcrumbs'][] = ['label' => 'Operacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

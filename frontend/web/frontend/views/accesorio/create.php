<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Accesorio */

$this->title = Yii::t('app', 'Create Accesorio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesorios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accesorio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

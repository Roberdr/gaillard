<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 13/03/16
 * Time: 19:49
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelCuba common\models\Cuba */
/* @var $modelsCompartimento common\models\Compartimento */

$this->title = 'Modificar Cuba: GAIU' . ' ' . $modelCuba->cuba;
$this->params['breadcrumbs'][] = ['label' => 'Cubas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelCuba->cuba, 'url' => ['view', 'id' => $modelCuba->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelCuba' => $modelCuba,
        'modelsCompartimento' => $modelsCompartimento,
    ]) ?>

</div>
<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 13/03/16
 * Time: 19:47
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $modelCuba common\models\Cuba */
/* @var $modelsCompartimento common\models\Compartimento */

$this->title = 'Crear Cuba';
$this->params['breadcrumbs'][] = ['label' => 'Cubas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelCuba' => $modelCuba,
        'modelsCompartimento' => $modelsCompartimento,
    ]) ?>

</div>
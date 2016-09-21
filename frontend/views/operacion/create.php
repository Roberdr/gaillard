<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 14/03/16
 * Time: 19:16
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Operacion */

$this->title = 'Crear Trabajo de Mantenimiento';
$this->params['breadcrumbs'][] = ['label' => 'Operaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
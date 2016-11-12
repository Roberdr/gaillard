<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 21/09/16
 * Time: 20:29
 */
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vehiculo */

$this->title = Yii::t('app', 'Crear Vehículo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehículos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
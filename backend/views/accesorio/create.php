<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 25/09/16
 * Time: 11:20
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Accesorio */
/* @var $modelsDetalle common\models\DetalleAccesorio */

$this->title = Yii::t('app', 'Crear Accesorio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesorios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accesorio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsDetalle' => $modelsDetalle,
    ]) ?>

</div>
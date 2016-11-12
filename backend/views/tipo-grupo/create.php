<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 24/10/16
 * Time: 20:13
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TipoGrupo */

$this->title = Yii::t('app', 'Crear Tipo Grupo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-grupo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
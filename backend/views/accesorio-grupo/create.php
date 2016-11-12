<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 26/10/16
 * Time: 23:23
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AccesorioGrupo */
/* @var $grupo_id integer */

$this->title = Yii::t('app', 'Crear Accesorio Grupo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accesorio Grupo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accesorio-grupo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'grupo_id' => $grupo_id,
    ]) ?>

</div>
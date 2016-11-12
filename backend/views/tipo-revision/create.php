<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 5/11/16
 * Time: 15:33
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TipoRevision */

$this->title = Yii::t('app', 'Create Tipo Revision');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Revisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-revision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
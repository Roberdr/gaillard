<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 26/10/16
 * Time: 23:22
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AccesorioGrupoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Accesorios Por Grupo');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accesorio-grupo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Accesorio Grupo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grupo_id',
            'grupo.tipoGrupo.nombre_grupo',
            'accesorio.tipoAccesorio.tipo_accesorio',
            'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
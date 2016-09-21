<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 13/03/16
 * Time: 19:50
 */

use yii\helpers\Html;
use yii\bootstrap\Tabs;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cuba */
/* @var $revision common\models\Revision */

$this->title = 'GAIU ' . $model->cuba;
$this->params['breadcrumbs'][] = ['label' => 'Cubas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuba-view">

    <h1><?= Html::encode($this->title)  ?>
        <span style="border: double"><?= Html::encode($model->num_cuadro)  ?></span>
    </h1>
    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Ficha Básica',
                'content' => $this->render('_fichaBasica', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'tab_fichaBasica'],
            ],
            [
                'label' => 'Ficha IMDG',
                'content' => $this->render('_fichaTecnica1', ['model' => $model]),
                'headerOptions' => [],
                'options' => ['id' => 'tab_fichaTecnica1'],
            ],
            [
                'label' => 'Ficha CSC',
                'content' => $this->render('_fichaTecnica2', ['model' => $model]),
                'active' => true,
                'headerOptions' => [],
                'options' => ['id' => 'tab_fichaTecnica2'],
            ],
            [
                'label' => 'Inspecciones oficiales',
                'content'=> $this->render('_inspecOficiales', ['model' => $model, 'revision' => $revision]),
            ],
            [
                'label' => 'Operaciones de mantenimiento',
                'content'=> $this->render('_operacionesMantenimiento',
                    ['model' => $model, 'operacion' => $operacion]),
            ]
        ],
    ]) ?>

</div>
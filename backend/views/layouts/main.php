<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/images/logo_gaillard.JPG" style="display:block; vertical-align: top; height:50px;"',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
        'brandOptions' => [
            'style' => 'padding:0px',
            ]
    ]);
    $menuItems = [
        ['label' => Yii::t('app', 'Productos'), 'url' => ['#']],
        ['label' => Yii::t('app', 'Cubas'), 'url' => ['/cuba/index'], 'items' => [
            ['label' => Yii::t('app', 'Ver cubas'), 'url' => ['/cuba/index']],
            ['label' => Yii::t('app', 'Mantenimiento'), 'url' => ['/operacion/index']],
            ['label' => Yii::t('app', 'Revisiones'), 'url' => ['/revision/index']],
        ]],
        ['label' => Yii::t('app', 'Vehículos'), 'url' => ['/vehiculo/index'], 'items' => [
            ['label' => Yii::t('app', 'Ver vehículos'), 'url' => ['/vehiculo/index']],
            ['label' => Yii::t('app', 'Revisiones'), 'url' => ['/revision-vehiculo/index']],
        ]],
        ['label' => Yii::t('app', 'GRGs'), 'url' => ['#']],
        ['label' => Yii::t('app', 'Bombas'), 'url' => ['#']],
        ['label' => Yii::t('app', 'Otros'), 'url' => ['#'], 'items' => [
            ['label' => Yii::t('app', 'Mangueras'), 'url' => ['#']],
            ['label' => Yii::t('app', 'Cables'), 'url' => ['#']],
            ['label' => Yii::t('app', 'Maquinaria'), 'url' => ['#']],
            ['label' => Yii::t('app', 'Accesorios'), 'url' => ['/accesorio/index-grupo'], 'items' => [
                ['label' => Yii::t('app', 'Grupo/Accesorio'), 'url' => ['/accesorio/index-grupo']],
                ['label' => Yii::t('app', 'Ver grupos'), 'url' => ['/grupo/index']],
                ['label' => Yii::t('app', 'Crear Accesorio'), 'url' => ['/accesorio/create']],
                ['label' => Yii::t('app', 'Crear Grupo'), 'url' => ['/grupo/create']],
            ]],
        ]],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Entrar', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Salir (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Casa Gaillard <?= date('Y') ?></p>
        <p class="col-lg-7 text-center"><?= Yii::t('app', 'Programado por') ?> <span class="label label-success">Roberto Díaz</span></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

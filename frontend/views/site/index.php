<?php

use yii\helpers\Url;

use frontend\assets\IndexAsset;
IndexAsset::register($this);

/* @var $this yii\web\View */

$this->title = 'Casa Gaillard';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Casa Gaillard</h1>

        <p class="lead">Fundada en 1924.</p>
        <!--
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
        -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 col1">
            </div>
            <div class="col-lg-4 col2">
            </div>
            <div class="col-lg-4 col3">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Gestión de cubas.</h2>

                <p>Características de las cubas. Materiales que transportan. Mantenimiento realizado. Revisiones realizadas
                    y por realizar.</p>

                <p><a class="btn btn-default btn-col1" href="<?= Url::to(['cuba/index'])?>">Ir a gestión cubas.</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gestión de vehículos.</h2>

                <p>Detalle de los vehículos de empresa. Control de revisiones oficiales y reparaciones efectuadas
                    y programadas</p>

                <p><a class="btn btn-default" href="<?= Url::to(['vehiculo/index'])?>">Vehículos</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gestión de GRGs</h2>

                <p>Control de los GRGs de que dispone la empresa. Tipo, numeración, producto que transporta, fecha de caducidad,
                    cliente al que se lleva, etc </p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">GRGs</a></p>
            </div>
        </div>

    </div>
</div>

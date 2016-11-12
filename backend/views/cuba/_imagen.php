<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 15/10/16
 * Time: 21:31
 */

/* @var $items array */

use yii\bootstrap\Carousel;

?>

<div>
    <?=  Carousel::widget([
        'items' =>
            $fotos,
    ]);
    ?>
</div>

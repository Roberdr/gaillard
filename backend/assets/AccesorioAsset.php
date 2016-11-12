<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 22/10/16
 * Time: 7:56
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    
    public $css = [
        
    ];
    public $js = [
        'accesorio'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

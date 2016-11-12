<?php
/**
 * Created by PhpStorm.
 * User: rober
 * Date: 24/09/16
 * Time: 11:08
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class IndexAsset extends AssetBundle
{
    
    public $css = [
        //'css/site.css',
        'css/index.css',
    ];
    public $js = [
        
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

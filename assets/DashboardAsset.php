<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        "css/bootstrap.min.css",
//        "css/fontawesome-all.min.css",
//        "css/iofrm-style.css",
//        "css/iofrm-theme4.css",
    ];
    public $js = [
        "lib/chart.js/Chart.bundle.min.js",
        "lib/jquery.flot/jquery.flot.js",
        "lib/jquery.flot/jquery.flot.stack.js",
        "lib/jquery.flot/jquery.flot.resize.js",
        "assets/js/dashforge.sampledata.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

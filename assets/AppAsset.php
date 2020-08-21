<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

//        vendor css
        "lib/@fortawesome/fontawesome-free/css/all.min.css",
        "lib/ionicons/css/ionicons.min.css",
        "lib/typicons.font/typicons.css",
        "css/pe-icon-7.css",

//     DashForge CSS
        "assets/css/dashforge.css",
        "assets/css/dashforge.profile.css",
    ];
    public $js = [
//        "lib/jquery/jquery.min.js",
        "lib/bootstrap/js/bootstrap.bundle.min.js",
        "js/bootstrap-notify.js",
        "lib/feather-icons/feather.min.js",
        "lib/perfect-scrollbar/perfect-scrollbar.min.js",

        "assets/js/dashforge.js",
        "assets/js/dashforge.aside.js",

//        append theme customizer
        "lib/js-cookie/js.cookie.js",
        "assets/js/dashforge.settings.js",
        "js/sso.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

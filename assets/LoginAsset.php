<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/login-theme/';
    public $css = [
        "css/bootstrap.min.css",
        "css/fontawesome-all.min.css",
        "css/iofrm-style.css",
        "css/iofrm-theme4.css",
    ];
    public $js = [
//        "js/jquery.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

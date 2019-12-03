<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/custom.css',
        'simulor/css/app.css',
        'jui/jquery-ui.css',
        'simulor/css/bootstrap.min.css',
        'simulor/font-awesome/css/font-awesome.min.css',
        'simulor/css/icons.min.css',
        'dropify/css/dropify.min.css',
        'izi/css/iziToast.min.css',
    ];
    public $js = [
        'simulor/js/bootstrap.js',
        'dropify/js/dropify.min.js',
        'jui/jquery-ui.min.js',
        'simulor/js/app.min.js',
        'izi/js/iziToast.min.js',
        'simulor/js/pages/dashboard.init.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

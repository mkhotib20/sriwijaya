<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/bootstrap.min.css',
        'theme/css/jquery-ui.css',
        'theme/css/style.css',
        'theme/fonts/feather/css/iconfont.css',
        'theme/font-awesome/css/font-awesome.min.css',
        'theme/css/icons.min.css',
        'owl/owl.carousel.min.css',
        'owl/owl.theme.default.min.css',
        'toastr/toastr.min.css',
    ];
    public $js = [
        'theme/js/jquery.min.js',
        'theme/js/jquery-ui.min.js',
        'owl/owl.carousel.min.js',
        // 'theme/js/popper.min.js',
        'theme/js/bootstrap.min.js',
        'toastr/toastr.min.js',
    ];
    public $depends = [
    ];
}

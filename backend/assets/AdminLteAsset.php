<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLteAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $baseUrl = '@web';
    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'dist/css/skins/_all-skins.min.css',
        'dist/css/AdminLTE.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
    ];
    public $js = [
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        //'plugins/slimScroll/jquery.slimscroll.min.js',
        //'dist/js/app.min.js',
        'dist/js/adminlte.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js',
    ];
    public $depends = [
        //'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

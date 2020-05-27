<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class WhiteappAsset extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
    public $sourcePath = __DIR__;
    public $css = [
        'css/Reset.css',
        'css/Master.css',
        'css/Fonts.css',
        'css/Constants.css',
        'css/Icons.css',
        'css/buttons.css',
        // Components
        'css/components/Header.css',
        'css/components/Footer.css',
        // Views
        'css/views/Home.css',
        'css/views/News.css',
        'css/views/Projects.css',
        'css/views/About.css',
        'css/views/Info.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
    public $publishOptions = ['forceCopy'=>true];

}

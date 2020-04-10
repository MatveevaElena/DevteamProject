<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MainAsset extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    public $css = [
        'css/reset.css',
        'css/main.css',
        'css/master.css',
        'css/fonts.css',
        'css/constants.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $publishOptions = ['forceCopy'=>true];
}

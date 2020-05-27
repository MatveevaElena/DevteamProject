<?php

namespace common\modules\projectexchange\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ProjectAsset extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    // public $sourcePath = '@media';
    public $css = [
        'css/project.css',
    ];
    public $js = [
        'js/project.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    
    public $publishOptions = ['forceCopy'=>true];

}

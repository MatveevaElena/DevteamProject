<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class InfoAsset extends AssetBundle
{
    public $sourcePath = __DIR__;
    
    public $css = [
    ];
    public $js = [
    ];
    public $depends = [
    ];
    public $publishOptions = ['forceCopy' => true];

}

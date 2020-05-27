<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MediaAsset extends AssetBundle
{
    public $baseUrl = '@web';//frontend/assets
    
    public $css = [
    ];
    public $js = [
    ];
    public $depends = [
    ];
    public $publishOptions = ['forceCopy' => true];

}

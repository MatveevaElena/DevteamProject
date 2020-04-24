<?php

namespace common\modules\projectexchange;

// use common\components\ExModule;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\projectexchange\controllers';
    public $defaultRoute = 'projectexchange';
    public $cacheTime = 3600;
    public $namespaceTranslations = '@common/modules/projectexchange/messages';
}



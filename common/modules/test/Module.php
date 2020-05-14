<?php

namespace common\modules\test;

// use common\components\ExModule;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\test\controllers';
    public $defaultRoute = 'test';
    public $cacheTime = 1;
    public $namespaceTranslations = '@common/modules/test/messages';
}



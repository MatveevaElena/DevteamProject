<?php

namespace common\modules\roles;

// use common\components\ExModule;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\roles\Controllers';
    public $defaultRoute = 'roles';
    public $cacheTime = 1;
    public $namespaceTranslations = '@common/modules/roles/messages';
}



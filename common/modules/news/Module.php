<?php

namespace common\modules\news;

// use common\components\ExModule;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\news\controllers';
    public $defaultRoute = 'news';
    public $cacheTime = 1;
    public $namespaceTranslations = '@common/modules/news/messages';
}



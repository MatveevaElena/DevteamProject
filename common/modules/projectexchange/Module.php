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

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations(){
        Yii::$app->i18n->translations['ML*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/modules/projectexchange/messages',
            'fileMap' => [
                'ML' => 'ML.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null){
        return Yii::t($category, $message, $params, $language);
    }
}



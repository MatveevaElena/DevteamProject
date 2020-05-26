<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru_RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'news' => 'site/news',
                'projects' => 'projectexchange/project/indexall',
                'info' => 'site/info',
                'about' => 'site/about',
                '<controller:(\w+)>/<action:(\w+)>/<id:\d+>' => '<controller>/<action>',
                '<controller:(\w+)>/<action:(\w+)>' => '<controller>/<action>',
                '<module:(\w+)>/<controller:(\w+)>/<action:(\w+)>' => '<module>/<controller>/<action>',
                '<module:(\w+)>/<controller:(\w+)>/<action:(\w+)>/<id:\d+>' => '<module>/<controller>/<action>',
                '<a:(login|logout|request-password-reset)>' => 'site<a>',
            ],
        ],
        'i18n' => [
            'translations' => [
                'ML*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        // 'ML/Base' => 'ML.php',
                        'ML' => 'ML.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => [
        'projectexchange' => [
            'class' => 'common\modules\projectexchange\Module',
        ],
        'roles' => [
            'class' => 'common\modules\roles\Module',
        ],
        'test' => [
            'class' => 'common\modules\test\Module',
        ],
        'news' => [
            'class' => 'common\modules\news\Module',
        ],
    ]
];

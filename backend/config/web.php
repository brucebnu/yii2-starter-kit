<?php
$config = [
    'name'    => env('NAME_BACKEND'),
    'homeUrl' => Yii::getAlias('@backendUrl'),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'timeline-event/index',
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey'   => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl'               => env('BACKEND_BASE_URL'),
        ],
        'user' => [
            'class'           => yii\web\User::class,
            'identityClass'   => common\models\User::class,
            'loginUrl'        => ['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin'   => common\behaviors\LoginTimestampBehavior::class,
        ],
        'view' => [
            'theme' => [
                'basePath' => '@backend/themes/'.env('THEME_BACKEND'),
                'baseUrl'  => '@backend/themes/'.env('THEME_BACKEND'),

                'pathMap'  => [
                    '@backend/views' => '@backend/themes/'.env('THEME_BACKEND'),
                    '@backend/views'     => [
                        //'@backend/themes/adminlte3',
                        '@backend/themes/'.env('THEME_BACKEND'),
                        // '@backend/themes/basic',
                    ],
                    // '@backend/views' => '@backend/themes/'.env('THEME_BACKEND'),
                    // '@backend/views' => '@backend/themes/'.env('THEME_BACKEND'),

                    # 主题化模块
                    # 它允许你将 @app/modules/blog/views/comment/index.php 主题化成 @app/themes/basic/modules/blog/views/comment/index.php。
                    // '@app/views' => '@app/themes/basic',
                    '@app/modules' => '@backend/themes/basic/modules',
                ],
            ],
        ],

    ],
    'modules' => [
        'content' => [
            'class' => backend\modules\content\Module::class,
        ],
        'widget' => [
            'class' => backend\modules\widget\Module::class,
        ],
        'file' => [
            'class' => backend\modules\file\Module::class,
        ],
        'system' => [
            'class' => backend\modules\system\Module::class,
        ],
        'translation' => [
            'class' => backend\modules\translation\Module::class,
        ],
        'rbac' => [
            'class' => backend\modules\rbac\Module::class,
            'defaultRoute' => 'rbac-auth-item/index',
        ],
        # 机构
        'org' => [
            'class' => backend\modules\org\Module::class,
        ],
        # 测试演示
        'crud' => [
            'class' => backend\modules\crud\Module::class,
        ],

        # org机构管理模块

    ],
    'as globalAccess' => [
        'class' => common\behaviors\GlobalAccessBehavior::class,
        'rules' => [
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['?'],
                'actions' => ['login'],
            ],
            [
                'controllers' => ['sign-in'],
                'allow' => true,
                'roles' => ['@'],
                'actions' => ['logout'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['?', '@'],
                'actions' => ['error'],
            ],
            [
                'controllers' => ['debug/default'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'controllers' => ['user'],
                'allow' => true,
                'roles' => ['administrator'],
            ],
            [
                'controllers' => ['user'],
                'allow' => false,
            ],
            [
                'allow' => true,
                'roles' => ['manager', 'administrator'],
            ],
        ],
    ],
];

/*
if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates'),
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend',
            ],
        ],
    ];
}
*/
return $config;

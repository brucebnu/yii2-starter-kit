<?php
$config = [
    'name' => 'Yii2 Starter Kit',
    'vendorPath' => __DIR__ . '/../../vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'en-US',
    'language' => 'en-US',
    'timeZone' => 'PRC', // Asia/Shanghai
    'charset' => 'utf-8',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'response' => [
            'on beforeSend' => function($event) {
                $event->sender->headers->add('X-UID', 'user_id_'.getMyId());
            },
        ],
        'authManager' => [
            'class'             => yii\rbac\DbManager::class,
            'itemTable'         => '{{%rbac_auth_item}}',
            'itemChildTable'    => '{{%rbac_auth_item_child}}',
            'assignmentTable'   => '{{%rbac_auth_assignment}}',
            'ruleTable'         => '{{%rbac_auth_rule}}'
        ],

        /**
        CREATE TABLE session
        (
        id CHAR(40) NOT NULL PRIMARY KEY,
        expire INTEGER,
        data LONGBLOB
        )

        CREATE TABLE `session` (
        `id` char(64) NOT NULL,
        `expire` int(11) DEFAULT NULL,
        `user_id` int(11) DEFAULT NULL,
        `udid` varchar(255) DEFAULT NULL,
        `data` LONGBLOB,
        `created_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`) USING BTREE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        */
        /*
        'session' => [
            'class'     => \yii\web\DbSession::class,
            'timeout'   => 86400*7, //session expire
            'writeCallback' => function($session){
                return [
                    'user_id' => Yii::$app->user->id,
                    'created_at' => date('Y-m-d H:i:s', time()),
                    //'expire' => time() + 86400 * 7,
                ];
            },
            // Set the following if you want to use DB component other than
            // default 'db'.
            'db' => 'logs',

            // To override default session table, set the following
            // default 'session'
            // 'sessionTable' => 'my_session',
        ],
        */
        'cache' => [
            'class' => yii\caching\FileCache::class,
            'cachePath' => '@common/runtime/cache'
        ],

        'commandBus' => [
            'class' => trntv\bus\CommandBus::class,
            'middlewares' => [
                [
                    'class' => trntv\bus\middlewares\BackgroundCommandMiddleware::class,
                    'backgroundHandlerPath' => '@console/yii',
                    'backgroundHandlerRoute' => 'command-bus/handle',
                ]
            ]
        ],

        'formatter' => [
            'class' => yii\i18n\Formatter::class
        ],

        'glide' => [
            'class' => trntv\glide\components\Glide::class,
            'sourcePath' => '@storage/web/source',
            'cachePath' => '@storage/cache',
            'urlManager' => 'urlManagerStorage',
            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
            'signKey' => env('GLIDE_SIGN_KEY')
        ],

        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'useFileTransport' =>false,              //这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => env('SMTP_HOST'),     //每种邮箱的host配置不一样
                'username' => env('SMTP_EMAIL'),
                'password' => env('SMTP_PS'),   //注意这里不是填写阿里云企业邮箱密码而是填写邮件推送SMTP密码
                'port' => env('SMTP_PORT'),     //这里25或者80都是可以的
                //'encryption' => 'tls',             //这里设置tls或者ssl加密方式都不能成功发送,即使ssl时端口修改为465
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => env('SMTP_EMAIL')
            ]
        ],
        'db' => [
            'class' => yii\db\Connection::class,
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'enableSchemaCache' => YII_ENV_PROD,
        ],
        'org' => [
            'class' => yii\db\Connection::class,
            'dsn' => env('DB_DSN_ORG'),
            'username' => env('DB_USERNAME_ORG'),
            'password' => env('DB_PASSWORD_ORG'),
            'tablePrefix' => env('DB_TABLE_PREFIX_ORG'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'enableSchemaCache' => YII_ENV_PROD,
        ],
        'logs' => [
            'class' => yii\db\Connection::class,
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'enableSchemaCache' => YII_ENV_PROD,
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    //'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*', 'yii\debug\Module:*','application'],
                    'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*', 'yii\debug\Module:*','application'],
                    'prefix' => function () {
                        $logged_ip = !Yii::$app->getRequest()->getUserIP() ? '' : Yii::$app->getRequest()->getUserIP();
                        $user_id = isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : 0;

                        $url = null;
                        if(!Yii::$app->request->isConsoleRequest){
                            $url = Yii::$app->request->getHostInfo().Yii::$app->request->getUrl();
                        }

                        return sprintf(
                            '[%s] [IP: %s] [user_id: %s] [%s]',
                            Yii::$app->id, $logged_ip, $user_id, $url
                        );
                    },
                    'logVars' => ['*'],
                    'logTable' => '{{%system_log}}'
                ]
            ],
        ],

        'i18n' => [
            'translations' => [
                # 创建i18n配置文件
                // php console/yii message/config --languages=ja,ko --messagePath=messages @common/config/messages/php.php

                // 生成语言配置文件
                // php console/yii message/extract @common/config/messages/php.php

                // 生成语言DB文件
                // php console/yii message/extract @common/config/messages/db.php

                /* Uncomment this code to use DbMessageSource*/
                // php console/yii message/migrate @common/config/messages/php.php @common/config/messages/db.php
                /*
                '*'=> [
                    'class'                 => yii\i18n\DbMessageSource::class,
                    'sourceMessageTable'    =>'{{%i18n_source_message}}',
                    'messageTable'          =>'{{%i18n_message}}',
                    'enableCaching'         => YII_ENV_DEV,
                    'cachingDuration'       => 3600,
                    # 这时请求的翻译可能在消息翻译源文件找不到。 这可通过使用 missingTranslation - yii\i18n\MessageSource 的事件来完成。
                    'on missingTranslation' => [backend\modules\translation\Module::class, 'missingTranslation']
                ],
                */
                '*' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                        'backend' => 'backend.php',
                        'frontend' => 'frontend.php',
                    ],
                    'on missingTranslation' => [backend\modules\translation\Module::class, 'missingTranslation']
                ],
            ],
        ],

        'fileStorage' => [
            'class' => trntv\filekit\Storage::class,
            'baseUrl' => '@storageUrl/source',
            'filesystem' => [
                'class' => common\components\filesystem\LocalFlysystemBuilder::class,
                'path' => '@storage/web/source'
            ],
            'as log' => [
                'class' => common\behaviors\FileStorageLogBehavior::class,
                'component' => 'fileStorage'
            ]
        ],

        'keyStorage' => [
            'class' => common\components\keyStorage\KeyStorage::class
        ],

        'urlManagerBackend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('BACKEND_HOST_INFO'),
                'baseUrl' => env('BACKEND_BASE_URL'),
            ],
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerFrontend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('FRONTEND_HOST_INFO'),
                'baseUrl' => env('FRONTEND_BASE_URL'),
            ],
            require(Yii::getAlias('@frontend/config/_urlManager.php'))
        ),
        'urlManagerStorage' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('STORAGE_HOST_INFO'),
                'baseUrl' => env('STORAGE_BASE_URL'),
            ],
            require(Yii::getAlias('@storage/config/_urlManager.php'))
        ),

        'queue' => [
            'class' => \yii\queue\file\Queue::class,
            'path' => '@common/runtime/queue',
        ],
    ],
    # Yii::$app->params['pageSize']
    # 'params' => require(__DIR__.'/params.php'),
    'params' => [
        'adminEmail' => env('ADMIN_EMAIL'),
        'robotEmail' => env('ROBOT_EMAIL'),
        'availableLocales' => [
            'en-US' => 'English (US)',
            'ru-RU' => 'Русский (РФ)',
            'uk-UA' => 'Українська (Україна)',
            'es' => 'Español',
            'fr' => 'Français',
            'vi' => 'Tiếng Việt',
            'zh-CN' => '简体中文',
            'pl-PL' => 'Polski (PL)',
        ],
    ],
];

if (YII_ENV_PROD) {
    $config['components']['log']['targets']['email'] = [
        'class' => yii\log\EmailTarget::class,
        'except' => ['yii\web\HttpException:*'],
        'levels' => ['error', 'warning'],
        'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
    ];
}

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class
    ];

    $config['components']['cache'] = [
        'class' => yii\caching\DummyCache::class
    ];
    $config['components']['mailer']['transport'] = [
        'class' => 'Swift_SmtpTransport',
        'host' => env('SMTP_HOST'),
        'port' => env('SMTP_PORT'),
    ];
}

return $config;

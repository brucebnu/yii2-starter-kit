<?php
$config = [
    'components' => [
        'assetManager' => [
            'class' => yii\web\AssetManager::class,
            'linkAssets' => env('LINK_ASSETS'), // true is open symbolic link
            'appendTimestamp' => YII_ENV_DEV,        // true is clear http cache
            /*
            # 预处理工具来转换资源
            'converter' => [
                'class' => yii\web\AssetConverter::class,
                'commands' => [
                    'less' => ['css', 'lessc {from} {to} --no-color'],
                    'ts' => ['js', 'tsc --out {to} {from}'],
                ],
            ],
            */

            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],  // 去除 bootstrap.css
                    'sourcePath' => null, // 防止在 frontend/web/asset 下生产文件
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],  // 去除 bootstrap.js
                    'sourcePath' => null,  // 防止在 frontend/web/asset 下生产文件
                ],

                # https://www.yiiframework.com/doc/guide/2.0/zh-cn/structure-assets
                /*
                'all' => [
                    'class'     => yii\web\AssetBundle::class,
                    'basePath'  => '@webroot/assets',
                    'baseUrl'   => '@web/assets',
                    'css'       => ['all-xyz.css'],
                    'js'        => ['all-xyz.js'],
                ],
                'A' => ['css' => [], 'js' => [], 'depends' => ['all']],
                'B' => ['css' => [], 'js' => [], 'depends' => ['all']],
                'C' => ['css' => [], 'js' => [], 'depends' => ['all']],
                'D' => ['css' => [], 'js' => [], 'depends' => ['all']],
                */
            ],

        ]
    ],
    'as locale' => [
        'class' => common\behaviors\LocaleBehavior::class,
        'enablePreferredLanguage' => true
    ]
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['*'],
    ];
}


if (YII_ENV_DEV) {
    # "schmunk42/yii2-giiant": "^0.10.8",
    # "schmunk42\\giiant\\": "brucebnu/yii2-giiant/src"
    $config['modules']['gii'] = [
        'allowedIPs' => ['*'],
        'generators' => [
            // todolist
            # 生成config、把模板文件copy到指定目录，可以自定义修改
            # 国际话中文

            // generator name
            'giiant-model' => [
                //generator class
                'class' => \schmunk42\giiant\generators\model\Generator::class,
                //setting for out templates
                'templates' => [
                    // template name => path to template
                    'myModel' => '@backend/giiTemplates/adminlte3/model/default',
                ]
            ],
            'giiant-crud' => [
                'class' => \schmunk42\giiant\generators\crud\Generator::class,
                'templates' => [
                    'myCrud' => '@backend/giiTemplates/adminlte3/crud/default',
                ]
            ],
            'giiant-module' => [
                'class' => \schmunk42\giiant\generators\module\Generator::class,
                'templates' => [
                    'myModel' => '@backend/giiTemplates/adminlte3/module/default',
                ]
            ],
            'giiant-test' => [
                'class' => \schmunk42\giiant\generators\test\Generator::class,
                'templates' => [
                    'myTest' => '@backend/giiTemplates/adminlte3/test/default',
                ]
            ],
            'giiant-extension' => [
                'class' => \schmunk42\giiant\generators\extension\Generator::class,
                'templates' => [
                    'myModule' => '@backend/giiTemplates/adminlte3/extension/default',
                ]
            ]
        ],
    ];
}


return $config;

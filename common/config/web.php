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
            # https://www.yiiframework.com/doc/guide/2.0/zh-cn/structure-assets
            'bundles' => [
                'all' => [
                    'class' => 'yii\web\AssetBundle',
                    'basePath' => '@webroot/assets',
                    'baseUrl' => '@web/assets',
                    'css' => ['all-xyz.css'],
                    'js' => ['all-xyz.js'],
                ],
                'A' => ['css' => [], 'js' => [], 'depends' => ['all']],
                'B' => ['css' => [], 'js' => [], 'depends' => ['all']],
                'C' => ['css' => [], 'js' => [], 'depends' => ['all']],
                'D' => ['css' => [], 'js' => [], 'depends' => ['all']],
            ],
            */
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
    # "schmunk42\\giiant\\": "brucebnu/yii2-giiant/src"
    $config['modules']['gii'] = [
        'allowedIPs' => ['*'],
        'generators' => [
            // generator name
            'giiant-model' => [
                //generator class
                'class'     => \schmunk42\giiant\generators\model\Generator::class,
                //setting for out templates
                'templates' => [
                    // template name => path to template
                    'myModel' => '@app/giiTemplates/model/default',
                    'myCrud'  => '@app/myTemplates/crud/default',
                ]
            ]
        ],
    ];
}


return $config;

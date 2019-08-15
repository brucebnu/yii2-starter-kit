<?php
$config = [
    'components' => [
        'assetManager' => [
            'class' => yii\web\AssetManager::class,
            'linkAssets' => env('LINK_ASSETS'),
            'appendTimestamp' => YII_ENV_DEV
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
                    'mymodel' =>
                        '@app/giiTemplates/model/default',
                ]
            ]
        ],
    ];
}


return $config;

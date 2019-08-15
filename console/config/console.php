<?php


$crudNs = '\backend\modules\crud';
return [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'command-bus' => [
            'class' => trntv\bus\console\BackgroundBusController::class,
        ],
        'message' => [
            'class' => console\controllers\ExtendedMessageController::class
        ],
        'migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/migrations/db',
            'migrationTable' => '{{%system_db_migration}}'
        ],
        'rbac-migrate' => [
            'class' => console\controllers\RbacMigrateController::class,
            'migrationPath'     => '@common/migrations/rbac/',
            'migrationTable'    => '{{%system_rbac_migration}}',
            'templateFile'       => '@common/rbac/views/migration.php'
        ],
        'batch' => [
            'class'                     => \schmunk42\giiant\commands\BatchController::class,
            'overwrite'                 => true,
            'modelNamespace'            => $crudNs . '\models',
            'modelQueryNamespace'       => $crudNs . '\models\query',
            'crudControllerNamespace'   => $crudNs . '\controllers',
            'crudSearchModelNamespace'  => $crudNs . '\models\search',
            'crudViewPath'              => '@backend/modules/crud/views',
            'crudPathPrefix'            => '/crud/',
            'crudTidyOutput'            => true,
            'crudActionButtonColumnPosition' => 'right', //left by default
            'crudProviders' => [
                \schmunk42\giiant\generators\crud\providers\core\OptsProvider::class
            ],
            'tablePrefix' => 'app_',
            'tables' => [
                'app_profile',
            ]
        ]
    ],
];

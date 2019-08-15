<?php
use schmunk42\giiant\generators\crud\callbacks\base\Callback;
use schmunk42\giiant\generators\crud\callbacks\yii\Db;
use schmunk42\giiant\generators\crud\callbacks\yii\Html;

# Universal CallbackProvider examples
# https://github.com/schmunk42/yii2-giiant/blob/master/docs/31-callback-provider-examples.md
$aceEditorField = function ($attribute, $model, $generator) {
    return "\$form->field(\$model, '{$attribute}')->widget(\\trntv\\aceeditor\\AceEditor::className())";
};
\Yii::$container->set(
    \schmunk42\giiant\generators\crud\providers\core\CallbackProvider::class,
    [
        'columnFormats' => [
            // hide system fields, but not ID in table
            'created_at$|updated_at$' => Callback::false(),
            // hide all TEXT or TINYTEXT columns
            '.*' => Db::falseIfText(),
        ],
        'activeFields' => [
            // hide system fields in form
            'id$' => Db::falseIfAutoIncrement(),
            'id$|created_at$|updated_at$' => Callback::false(),
            'value' => $aceEditorField,
        ],
        'attributeFormats' => [
            // render HTML output
            '_html$' => Html::attribute(),
        ],
    ]
);

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
            'class'             => yii\console\controllers\MigrateController::class,
            'migrationPath'     => '@common/migrations/db',
            'migrationTable'    => '{{%system_db_migration}}'
        ],
        'rbac-migrate' => [
            'class' => console\controllers\RbacMigrateController::class,
            'migrationPath'     => '@common/migrations/rbac/',
            'migrationTable'    => '{{%system_rbac_migration}}',
            'templateFile'      => '@common/rbac/views/migration.php'
        ],

        # https://github.com/schmunk42/yii2-giiant
        # https://github.com/schmunk42/yii2-giiant/blob/master/docs/25-cli-commands.md
        #
        /**
         * ./yii batch --tables=user_profile --db:db
         * yii help gii
         * yii gii/giiant-module
         */
        'batch' => [
            'class' => \schmunk42\giiant\commands\BatchController::class,
            'overwrite' => true,

            'modelNamespace'            => $crudNs . '\models',
            'modelQueryNamespace'       => $crudNs . '\models\query',
            'crudSearchModelNamespace'  => $crudNs . '\models\search',

            'crudControllerNamespace'   => $crudNs . '\controllers',
            'crudViewPath' => '@backend/modules/crud/views',

            'crudPathPrefix' => '/crud/',
            'crudTidyOutput' => true,
            'crudAccessFilter' => false,
            'crudProviders' => [
                \schmunk42\giiant\generators\crud\providers\core\OptsProvider::class
            ],
            //'tablePrefix' => 'project_',
//            'skipTables' => [
//                'article',
//                'user',
//
//            ],
        ]


    ],
];

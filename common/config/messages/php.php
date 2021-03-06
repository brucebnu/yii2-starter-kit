<?php
return \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/_base.php'),
    [
        // 'php' output format is for saving messages to php files.
        'format' => 'php',
        // Root directory containing message translations.
        'messagePath' => Yii::getAlias('@common/messages'),
        // boolean, whether the message file should be overwritten with the merged messages
        'overwrite' => true,
    ]
);

/**
 * Configuration file for 'yii message/extract' command.
 *
 * This file is automatically generated by 'yii message/config' command.
 * It contains parameters for source code messages extraction.
 * You may modify this file to suit your needs.
 *
 * You can use 'yii message/config-template' command to create
 * template configuration file with detailed description for each parameter.
 */
return [
    'color' => null,
    'interactive' => true,
    'help' => null,
    'sourcePath' => '@yii',
    'messagePath' => 'messages',
    'languages' => [],
    'translator' => 'Yii::t',
    'sort' => false,
    'overwrite' => true,
    'removeUnused' => false,
    'markUnused' => true,
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/BaseYii.php',
    ],
    'only' => [
        '*.php',
    ],
    'format' => 'php',
    'db' => 'db',
    'sourceMessageTable' => '{{%source_message}}',
    'messageTable' => '{{%message}}',
    'catalog' => 'messages',
    'ignoreCategories' => [],
    'phpFileHeader' => '',
    'phpDocBlock' => null,
];

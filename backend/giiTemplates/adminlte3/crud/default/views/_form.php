<?php

use yii\helpers\StringHelper;

/*
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

/** @var \yii\db\ActiveRecord $model */
## TODO: move to generator (?); cleanup
$model = new $generator->modelClass();
$model->setScenario('crud');
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $model->setScenario('default');
    $safeAttributes = $model->safeAttributes();
}
if (empty($safeAttributes)) {
    $safeAttributes = $model->getTableSchema()->columnNames;
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var <?= ltrim($generator->modelClass, '\\') ?> $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline <?= \yii\helpers\Inflector::camel2id(
    StringHelper::basename($generator->modelClass),
    '-',
    true
) ?>-form">
    <?= '<?php ' ?>$form = ActiveForm::begin([
        'id' => '<?= $model->formName() ?>',
        'layout' => '<?= $generator->formLayout ?>',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                #'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]);
    ?>
    <div class="card-body">
        <?php echo "<?php \$this->beginBlock('main'); ?>\n"; ?>
        <?php
        foreach ($safeAttributes as $attribute) {
            echo "\n\n<!-- attribute $attribute -->";
            $prepend = $generator->prependActiveField($attribute, $model);
            $field = $generator->activeField($attribute, $model);
            $append = $generator->appendActiveField($attribute, $model);

            if ($prepend) {
                echo "\n\t\t\t" . $prepend;
            }
            if ($field) {
                echo "\n\t\t\t<?= " . $field . ' ?>';
            }
            if ($append) {
                echo "\n\t\t\t" . $append;
            }
        }
        ?>
        <?php echo '<?php $this->endBlock(); ?>'; ?>

        <?php
        $label = substr(strrchr($model::className(), '\\'), 1);
        $items = <<<EOS
[
    'label'   => Yii::t('$generator->modelMessageCategory', '$label'),
    'content' => \$this->blocks['main'],
    'active'  => true,
],
EOS;
        ?>

        <?=
        "<?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        $items
                    ]
                 ]
            );
        ?>";
        ?>
        <?= '<?php ' ?>echo $form->errorSummary($model); ?>
    </div>

    <div class="card-footer">
        <?= '<?= ' ?>Html::submitButton(
        '<i class="fa fa-check"></i> ' .
        ($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Save') ?>),
        [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
        ]);
        ?>

        <?= '<?php ' ?>ActiveForm::end(); ?>
    </div>

</div>


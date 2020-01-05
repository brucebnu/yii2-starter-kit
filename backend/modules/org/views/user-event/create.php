<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserEvent $model
*/

$this->title = Yii::t('backend', 'User Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud user-event-create">

    <h1>
        <?= Yii::t('backend', 'User Event') ?>
        <small>
                        <?= Html::encode($model->event_id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            Yii::t('backend', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>

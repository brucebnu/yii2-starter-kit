<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Dormitory $model
*/

$this->title = Yii::t('backend', 'Dormitory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Dormitories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud dormitory-create">

    <h1>
        <?= Yii::t('backend', 'Dormitory') ?>
        <small>
                        <?= Html::encode($model->dormitory_id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="float-left">
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

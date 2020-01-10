<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnProvince $model
*/

$this->title = Yii::t('backend', 'Cn Province');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud cn-province-create">

    <h1>
        <?= Yii::t('backend', 'Cn Province') ?>
        <small>
                        <?= Html::encode($model->province_id) ?>
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

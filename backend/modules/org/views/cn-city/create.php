<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnCity $model
*/

$this->title = Yii::t('backend', 'Cn City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud cn-city-create">
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

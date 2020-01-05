<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserDormitory $model
*/

$this->title = Yii::t('backend', 'User Dormitory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Dormitories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud user-dormitory-create">
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

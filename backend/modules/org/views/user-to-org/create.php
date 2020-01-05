<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserToOrg $model
*/

$this->title = Yii::t('backend', 'User To Org');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User To Orgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud user-to-org-create">
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

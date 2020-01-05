<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserFlight $model
*/

$this->title = Yii::t('backend', 'User Flight');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Flights'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud user-flight-create">

    <h1>
        <?= Yii::t('backend', 'User Flight') ?>
        <small>
                        <?= Html::encode($model->org_user_flight_id) ?>
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

<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnProvince $model
*/

$this->title = Yii::t('backend', 'Cn Province');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn Province'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->province_id, 'url' => ['view', 'province_id' => $model->province_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud cn-province-update">

    <h1>
        <?= Yii::t('backend', 'Cn Province') ?>
        <small>
                        <?= Html::encode($model->province_id) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('backend', 'View'), ['view', 'province_id' => $model->province_id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>

<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserExpress $model
*/

$this->title = Yii::t('backend', 'User Express');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Express'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->express_id, 'url' => ['view', 'express_id' => $model->express_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud user-express-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'express_id' => $model->express_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>

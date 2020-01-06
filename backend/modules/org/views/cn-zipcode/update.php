<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnZipcode $model
*/

$this->title = Yii::t('backend', 'Cn Zipcode');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn Zipcode'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->zip_id, 'url' => ['view', 'zip_id' => $model->zip_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud cn-zipcode-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'zip_id' => $model->zip_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>

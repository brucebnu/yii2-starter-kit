<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserCourse $model
*/

$this->title = Yii::t('backend', 'User Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Course'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->org_user_course_id, 'url' => ['view', 'org_user_course_id' => $model->org_user_course_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud user-course-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'org_user_course_id' => $model->org_user_course_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>

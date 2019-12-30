<?php

use common\grid\EnumColumn;
use common\models\Page;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this         yii\web\View
 * @var $searchModel  \backend\models\search\PageSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Page
 */

$this->title = Yii::t('backend', 'Pages');

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card collapsed-card">
    <div class="card-header bg-success">
        <h3 class="card-title"> <i class="fas fa-edit"></i> <?php echo Yii::t('backend', 'Create {modelClass}', ['modelClass' => 'Page']) ?></h3>
        <small class="text-white m-md-1">请按要求填写空格</small>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-plus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'options' => [
        'class' => 'grid-view table-responsive',
    ],
    'columns' => [
        [
            'attribute' => 'id',
        ],
        [
            'attribute' => 'slug',
        ],
        [
            'attribute' => 'title',
            'value' => function ($model) {
                return Html::a($model->title, ['update', 'id' => $model->id]);
            },
            'format' => 'raw',
        ],
        [
            'class' => EnumColumn::class,
            'attribute' => 'status',
            'enum' => Page::statuses(),
            'filter' => Page::statuses(),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
        ],
    ],
]); ?>

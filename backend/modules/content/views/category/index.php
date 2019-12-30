<?php

use common\grid\EnumColumn;
use common\models\ArticleCategory;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this         yii\web\View
 * @var $searchModel  backend\modules\content\models\search\ArticleCategorySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        ArticleCategory
 * @var $categories   common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Article Categories');

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card collapsed-card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> <?php echo Yii::t('backend', 'Create {modelClass}', ['modelClass' => 'Article Category']) ?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php echo $this->render('_form', [
            'model' => $model,
            'categories' => $categories,
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
            'options' => ['style' => 'width: 5%'],
        ],
        [
            'attribute' => 'slug',
            'options' => ['style' => 'width: 15%'],
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
            'options' => ['style' => 'width: 10%'],
            'enum' => ArticleCategory::statuses(),
            'filter' => ArticleCategory::statuses(),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width: 5%'],
            'template' => '{update} {delete}',
        ],
    ],
]); ?>

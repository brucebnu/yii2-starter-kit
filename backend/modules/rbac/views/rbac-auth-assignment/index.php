<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Rbac Auth Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-assignment-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Rbac Auth Assignment',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            'user_id',
            'created_at:datetime',

            [
                'class' => yii\grid\ActionColumn::class,
                'options' => ['style' => 'width: 8%'],
                'template' => '{view} {update} ',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('backend', 'View'),
                            'aria-label' => Yii::t('backend', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<i class="fa fa-eye"></i>', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('backend', 'Update'),
                            'aria-label' => Yii::t('backend', 'Update'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<i class="fa fa-edit"></i>', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('backend', 'Delete'),
                            'aria-label' => Yii::t('backend', 'Delete'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<i class="fa fa-trash"></i>', $url, $options);
                    }
                ],
            ],
        ],
    ]); ?>

</div>

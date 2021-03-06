<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 * @var $this \yii\web\View
 * @var $model \common\models\TimelineEvent
 * @var $dataProvider \yii\data\ActiveDataProvider
 */
$this->title = Yii::t('backend', 'Application timeline');
$this->params['subtitle'] = '这是一个时间线的副标题';
$icons = [
    'user' => '<i class="fa fa-user bg-blue"></i>'
];
?>
<?php //\yii\widgets\Pjax::begin() ?>
<div class="row">
    <div class="col-md-12">
        <?php if ($dataProvider->count > 0): ?>
            <div class="timeline">
                <?php foreach ($dataProvider->getModels() as $model): ?>
                    <?php if (!isset($date) || $date != Yii::$app->formatter->asDate($model->created_at)): ?>
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-blue">
                                <?php echo Yii::$app->formatter->asDate($model->created_at) ?>
                            </span>
                        </div>
                        <?php $date = Yii::$app->formatter->asDate($model->created_at) ?>
                    <?php endif; ?>
                    <div>
                        <?php
                        try {
                            $viewFile = sprintf('%s/%s', $model->category, $model->event);
                            echo $this->render($viewFile, ['model' => $model]);
                        } catch (\yii\base\InvalidArgumentException $e) {
                            echo $this->render('_item', ['model' => $model]);
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
                <div>
                    <i class="fas fa-clock bg-gray">
                    </i>
                </div>
            </div>
        <?php else: ?>
            <?php echo Yii::t('backend', 'No events found') ?>
        <?php endif; ?>
    </div>
    <div class="col-md-12 text-center">
        <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'options' => ['class' => 'pagination']
        ]) ?>
    </div>
</div>
<?php //\yii\widgets\Pjax::end() ?>


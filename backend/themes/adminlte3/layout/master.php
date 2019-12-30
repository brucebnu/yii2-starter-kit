<?php
/**
 * @var \yii\web\View $this
 */

use common\assets\AdminLte3Asset;
use backend\assets\BackendAsset3;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$lteBundle = $this->registerAssetBundle(AdminLte3Asset::class);
Yii::$app->params['AdminlteWebUrl'] = $lteBundle->baseUrl;
$bundle = BackendAsset3::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" href="<?= Yii::$app->homeUrl?>/themes/adminlte3/favicon.ico?t=123456">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition sidebar-mini">

<?php $this->beginBody() ?>
<div class="wrapper">
    <?= $this->render('_nav') ?>
    <?= $this->render('_side') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            <?= Html::encode($this->title) ?>
                            <?php if (isset($this->params['subtitle'])): ?>
                                <small><?php echo $this->params['subtitle'] ?></small>
                            <?php endif; ?>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <?php
                        echo Breadcrumbs::widget([
                            'tag' => 'ol',
                            'options' => ['class' => 'breadcrumb float-sm-right'],
                            'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                            'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>',
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]);
                        /*
                        echo \yii\widgets\Breadcrumbs::widget([
                            'tag' => 'ol',
                            'options' => ['class' => 'breadcrumb float-sm-right'],
                            'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                            'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>',
                            'links' => [
                                ['label' => 'First', 'url' => '#'],
                                ['label' => 'Second', 'url' => '#'],
                            ],
                        ]);
                        */
                        ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <?= $content ?>
            </div>
        </section>
    </div>
    <?= $this->render('_footer') ?>
    <?= $this->render('_control_sidebar') ?>
</div>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

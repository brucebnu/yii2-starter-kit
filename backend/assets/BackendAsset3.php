<?php

namespace backend\assets;

use common\assets\AdminLte;
use common\assets\Html5shiv;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class BackendAsset3 extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot/themes/adminlte3/';
    /**
     * @var string
     */
    public $baseUrl = '@web/themes/adminlte3/';

    /**
     * @var array
     */
    public $css = [
        'css/style3.css'
    ];
    /**
     * @var array
     */
    public $js = [
        'js/app3.js'
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        //AdminLte::class,
        Html5shiv::class
    ];
}

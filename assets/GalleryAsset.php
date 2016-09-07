<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GalleryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/queries.css',
        'css/styles.css',
        'https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700',
        'css/bootstrap-image-gallery.min.css',
    ];
    public $js = [
        'js/fotorama.js',
        'js/bootstrap.min.js',
        'js/sticky_menu.js',
        'js/freewall.js',
        'js/bootstrap-image-gallery.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

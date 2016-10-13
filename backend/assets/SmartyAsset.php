<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SmartyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		//WEB FONTS
		'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext',
		//css
		'plugins/bootstrap/css/bootstrap.min.css',
		'css/essentials.css',
		'css/layout.css',
		'css/color_scheme/green.css',
        'css/site.css',
    ];
    public $js = [
		'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

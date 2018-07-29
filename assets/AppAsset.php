<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/bootstrap4/bootstrap.min.css',
      'plugins/font-awesome-4.7.0/css/font-awesome.min.css',
      'plugins/OwlCarousel2-2.2.1/owl.carousel.css',
      'plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
      'plugins/OwlCarousel2-2.2.1/animate.css',
      'css/main_styles.css',
      'css/responsive.css',
    ];
    public $js = [
      'js/jquery-3.2.1.min.js',
      'css/bootstrap4/popper.js',
      'css/bootstrap4/bootstrap.min.js',
      'plugins/greensock/TweenMax.min.js',
      'plugins/greensock/TimelineMax.min.js',
      'plugins/scrollmagic/ScrollMagic.min.js',
      'plugins/greensock/animation.gsap.min.js',
      'plugins/greensock/ScrollToPlugin.min.js',
      'plugins/OwlCarousel2-2.2.1/owl.carousel.js',
      'plugins/Isotope/isotope.pkgd.min.js',
      'plugins/easing/easing.js',
      'plugins/parallax-js-master/parallax.min.js',
      'js/custom.js',
      'js/main.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}

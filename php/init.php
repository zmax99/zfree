<?php
/**
 * ZFree(自由)模板 by ZMAX团队 (zmax99.com)
 *
 * @package    ZFree
 * @author     ZMAX团队 
 * @email      zhang19min88@163.com
 * @created    2017-06-04 
 * @copyright  Copyright (c) 南宁市程序人软件科技有限责任公司
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 * @link       http://www.zmax99.com/template/zfree ZFree主页
 */

defined('_JEXEC') or die;


// 加载模板库文件
!version_compare(PHP_VERSION, '5.3.10', '=>') or die('PHP的版本太低，你需要PHP5.3.10或者更高的版本才能运行ZFree模板');
require_once dirname(__FILE__) . '/libs/template.php';

/************************* 运行时配置 *********************************************************************/
$tpl = ZFreeTemplate::getInstance();
$tpl
    // enable or disable debug mode. Default in Joomla configuration.php
	// 是否开启调试模式：可以前往网站后台的全局设置中开启
    ->debug(true)
	    // include CSS files if it's not empty
    // compile less *.file to CSS and cache it
    // compile scss *.file to CSS and cache it (experimental!)
	// 如果新加CSS文件，在这里添加
    ->css(array(
         'template.css', // from zfree/css folder
		 '../uikit/css/uikit.min.css', // from zfree/css folder
        'template.less', // from zfree/less folder
        // 'template.scss',// from zfree/scss folder
        // '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', // any external lib (you can use http:// or https:// urls)
    ))
		// 如果新加JS文件，在这里添加
    ->js(array(
        // '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', // any external lib (you can use http:// or https:// urls)
        // 'libs/jquery-1.x.min.js', // your own local lib
		'../uikit/js/uikit.min.js', // from zfree/css folder
        'template.js',
    ))
		// 如果需要排除CSS文件，在这里设置即可（实验性质，可能有bug）
    ->excludeCSS(array(
        // 'regex pattern or filename',
        // 'zmaxshop\.css',
    ))

    // 如果需要排除JS文件，在这里设置即可（实验性质，可能有bug）
    ->excludeJS(array(
        // 'regex pattern or filename',
        // 'mootools',             // remove Mootools lib
        // 'media\/jui\/js',       // remove jQuery lib
        // 'media\/system\/js',    // remove system libs
    ))
		// 设置自定义的generator属性
    ->generator('ZFree Template')// null for disable

    // set HTML5 mode (for <head> tag)
    ->html5(true)
	    // add custom meta tags
	// 添加自定义的meta标签
    ->meta(array(
        // 模板meta自定义
        '<meta http-equiv="X-UA-Compatible" content="IE=edge">',
        '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">',

        // ICONS
        '<link rel="apple-touch-icon-precomposed" href="' . $tpl->img . '/icons/apple-touch-iphone.png">',
        // 网站校验实例：如百度验证
        '<meta name="baidu-site-verification" content="... baidu verification hash ..." />',
        '<meta name="yandex-verification" content="... yandex verification hash ..." />',
    ));
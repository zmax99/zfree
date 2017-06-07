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
// 初始化模板的帮助类文件
require dirname(__FILE__) . '/php/init.php';

/** @var JDocumentHtml $this */

$app  = JFactory::getApplication();
$user = JFactory::getUser();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;


$sitename = $app->get('sitename');


// 加载JQuery框架
JHtml::_('jquery.framework'); 

// Add template js
JHtml::_('script', '../uikit/js/uikit.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));
// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
JHtml::_('stylesheet', '../uikit/css/uikit.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));


// Check for a custom CSS JS file
JHtml::_('stylesheet', 'user.css', array('version' => 'auto', 'relative' => true));

JHtml::_('stylesheet', 'custom.css', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'user.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'custom.js', array('version' => 'auto', 'relative' => true));

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<jdoc:include type="head" />
	</head>
	<body class="<?php echo $tpl->getBodyClasses(); ?><?php echo $tpl->getPageClassSuffix();?>">
		<div class="body" id="top">
			<div class="z4-wrapper">
				<?php $tpl->loadBlock('top'); ?>
				<?php $tpl->loadBlock('header'); ?>
				<?php $tpl->loadBlock('mainnav'); ?>
				<?php $tpl->loadBlock('banner'); ?>
				<?php $tpl->loadBlock('content'); ?>
				<?php $tpl->loadBlock('spotlight'); ?>
				<?php $tpl->loadBlock('user'); ?>
				<?php $tpl->loadBlock('footer'); ?>
				<?php $tpl->loadBlock('copyright'); ?>
			</div>
		<?php if ($tpl->isDebug()) : ?>
			<jdoc:include type="modules" name="debug" />
		<?php endif; ?>
		</div>	
	</body>
</html>
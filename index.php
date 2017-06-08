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
//$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;


$sitename = $app->get('sitename');


// 加载JQuery框架
//JHtml::_('jquery.framework'); 

// Add template js
//JHtml::_('script', '../uikit/js/uikit.min.js', array('version' => 'auto', 'relative' => true));
//JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));
// Add html5 shiv
//JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
//JHtml::_('stylesheet', '../uikit/css/uikit.min.css', array('version' => 'auto', 'relative' => true));
//JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));


// Check for a custom CSS JS file
//JHtml::_('stylesheet', 'user.css', array('version' => 'auto', 'relative' => true));

//JHtml::_('stylesheet', 'custom.css', array('version' => 'auto', 'relative' => true));
//JHtml::_('script', 'user.js', array('version' => 'auto', 'relative' => true));
//JHtml::_('script', 'custom.js', array('version' => 'auto', 'relative' => true));

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<jdoc:include type="head" />
	</head>
	<body class="<?php echo $tpl->getBodyClasses(); ?><?php echo $tpl->getPageClassSuffix();?>">
		<div  id="body">
			<div class="z4-wrapper">
				<div id="z4-topbar">
					<?php $tpl->loadBlock('top'); ?>
				</div>
				<header  id="z4-header" class="z4-header" >
					<?php $tpl->loadBlock('header'); ?>	
				</header>
				<nav id="z4-nav" class="z4-nav">
					<?php $tpl->loadBlock('mainnav'); ?>
				</nav>
				<div class="z4-banner">
					<?php $tpl->loadBlock('banner'); ?>
				</div>
				<div class="z4-content">
					<?php $tpl->loadBlock('content'); ?>
				</div>
				<div class="z4-spotlight">
					<?php $tpl->loadBlock('spotlight'); ?>
				</div>
				<div class="z4-user">
					<?php $tpl->loadBlock('user'); ?>
				</div>
				<footer id="z4-footer">
					<div class="z4-footer">
						<?php $tpl->loadBlock('footer'); ?>
					</div>
					<div class="z4-copyright">
						<?php $tpl->loadBlock('copyright'); ?>
					</div>
				</div>
			</div>
			<?php if ($tpl->isDebug()) : ?>
			<div id="z4-debug">	
				<jdoc:include type="modules" name="debug" />
			</div>
			<?php endif; ?>
		</div>	
	</body>
</html>
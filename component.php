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

/** @var JDocumentHtml $this */

$app = JFactory::getApplication();

// Output as HTML5
$this->setHtml5(true);

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));

// Load optional rtl Bootstrap css and Bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<jdoc:include type="head" />
</head>
<body class="contentpane modal">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>

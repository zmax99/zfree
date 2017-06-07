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

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	$moduleTag     = $params->get('module_tag', 'div');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'), ENT_COMPAT, 'UTF-8');
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');

	if ($module->content)
	{
		echo '<' . $moduleTag . ' class="well ' . htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8') . $moduleClass . '">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}

			echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}

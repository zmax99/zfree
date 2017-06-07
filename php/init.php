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


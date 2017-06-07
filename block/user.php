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
$name="user";
?>
<div class="user">
	<?php if($this->countModules("user-1-row")):?>
	<div class="z4-user-1-row uk-grid">
		<div class="uk-width-1-1">
			<jdoc:include type="modules" name="user-1-row" style="html5" />
		</div>
	</div>
	<?php endif;?>

	<?php if($this->countModules(array("user-2-row-1","user-2-row-2"))):?>
	<div class="z4-user-2-row uk-grid">
		<div class="uk-width-1-2">
			<jdoc:include type="modules" name="user-2-row-1" style="html5" />
		</div>
		<div class="uk-width-1-2">
			<jdoc:include type="modules" name="user-2-row-2" style="html5" />
		</div>
	</div>
	<?php endif;?>

	<?php if($this->countModules(array("user-3-row-1","user-3-row-2","user-3-row-3"))):?>
	<div class="z4-user-3-row uk-grid">
		<div class="uk-width-1-3">
			<jdoc:include type="modules" name="user-3-row-1" style="html5" />
		</div>
		<div class="uk-width-1-3">
			<jdoc:include type="modules" name="user-3-row-2" style="html5" />
		</div>
		<div class="uk-width-1-3">
			<jdoc:include type="modules" name="user-3-row-3" style="html5" />
		</div>
	</div>
	<?php endif;?>

	<?php if($this->countModules(array("user-4-row-1","user-4-row-2","user-4-row-3","user-4-row-4"))):?>	
	<div class="z4-user-4-row uk-grid">
		<div class="uk-width-1-4">
			<jdoc:include type="modules" name="user-4-row-1" style="html5" />
		</div>
		<div class="uk-width-1-4">
			<jdoc:include type="modules" name="user-4-row-2" style="html5" />
		</div>
		<div class="uk-width-1-4">
			<jdoc:include type="modules" name="user-4-row-3" style="html5" />
		</div>
		<div class="uk-width-1-4">
			<jdoc:include type="modules" name="user-4-row-4" style="html5" />
		</div>
	</div>
	<?php endif;?>

	<?php if($this->countModules(array("user-5-row-1","user-5-row-2","user-5-row-3","user-5-row-4","user-5-row-5"))):?>	
	<div class="z4-user-5-row uk-grid">
		<div class="uk-width-1-5">
			<jdoc:include type="modules" name="user-5-row-1" style="html5" />
		</div>
		<div class="uk-width-1-5">
			<jdoc:include type="modules" name="user-5-row-2" style="html5" />
		</div>
		<div class="uk-width-1-5">
			<jdoc:include type="modules" name="user-5-row-3" style="html5" />
		</div>
		<div class="uk-width-1-5">
			<jdoc:include type="modules" name="user-5-row-4" style="html5" />
		</div>
		<div class="uk-width-1-5">
			<jdoc:include type="modules" name="user-5-row-5" style="html5" />
		</div>
	</div>
	<?php endif;?>

	<?php if($this->countModules(array("user-6-row-1","user-6-row-2","user-6-row-3","user-6-row-4","user-6-row-5","user-6-row-6"))):?>	
	<div class="z4-user-6-row uk-grid">
		<div class="uk-width-1-6">
			<jdoc:include type="modules" name="user-6-row-1" style="html5" />
		</div>
		<div class="uk-width-1-6">
			<jdoc:include type="modules" name="user-6-row-2" style="html5" />
		</div>
		<div class="uk-width-1-6">
			<jdoc:include type="modules" name="user-6-row-3" style="html5" />
		</div>
		<div class="uk-width-1-6">
			<jdoc:include type="modules" name="user-6-row-4" style="html5" />
		</div>
		<div class="uk-width-1-6">
			<jdoc:include type="modules" name="user-6-row-5" style="html5" />
		</div>
		<div class="uk-width-1-6">
			<jdoc:include type="modules" name="user-6-row-6" style="html5" />
		</div>
	</div>
	<?php endif;?>
</div>

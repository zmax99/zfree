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
$name="navhelper";
?>
<div class="navhelper">
	<div class="z4-container">
		<?php if($this->countModules("navhelper-1-row")):?>
		<div class="z4-navhelper-1-row uk-grid">
			<div class="uk-width-1-1">
				<jdoc:include type="modules" name="navhelper-1-row" style="none" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("navhelper-2-row-1","navhelper-2-row-2"))):?>
		<div class="z4-navhelper-2-row uk-grid">
			<div class="uk-width-1-2">
				<jdoc:include type="modules" name="navhelper-2-row-1" style="none" />
			</div>
			<div class="uk-width-1-2">
				<jdoc:include type="modules" name="navhelper-2-row-2" style="none" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("navhelper-3-row-1","navhelper-3-row-2","navhelper-3-row-3"))):?>
		<div class="z4-navhelper-3-row uk-grid">
			<div class="uk-width-1-3">
				<jdoc:include type="modules" name="navhelper-3-row-1" style="none" />
			</div>
			<div class="uk-width-1-3">
				<jdoc:include type="modules" name="navhelper-3-row-2" style="none" />
			</div>
			<div class="uk-width-1-3">
				<jdoc:include type="modules" name="navhelper-3-row-3" style="none" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("navhelper-4-row-1","navhelper-4-row-2","navhelper-4-row-3","navhelper-4-row-4"))):?>	
		<div class="z4-navhelper-4-row uk-grid">
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="navhelper-4-row-1" style="none" />
			</div>
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="navhelper-4-row-2" style="none" />
			</div>
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="navhelper-4-row-3" style="none" />
			</div>
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="navhelper-4-row-4" style="none" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("navhelper-5-row-1","navhelper-5-row-2","navhelper-5-row-3","navhelper-5-row-4","navhelper-5-row-5"))):?>	
		<div class="z4-navhelper-5-row uk-grid">
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="navhelper-5-row-1" style="none" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="navhelper-5-row-2" style="none" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="navhelper-5-row-3" style="none" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="navhelper-5-row-4" style="none" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="navhelper-5-row-5" style="none" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("navhelper-6-row-1","navhelper-6-row-2","navhelper-6-row-3","navhelper-6-row-4","navhelper-6-row-5","navhelper-6-row-6"))):?>	
		<div class="z4-navhelper-6-row uk-grid">
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="navhelper-6-row-1" style="none" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="navhelper-6-row-2" style="none" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="navhelper-6-row-3" style="none" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="navhelper-6-row-4" style="none" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="navhelper-6-row-5" style="none" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="navhelper-6-row-6" style="none" />
			</div>
		</div>
		<?php endif;?>
	</div>
</div>

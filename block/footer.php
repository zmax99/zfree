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
$name="footer";
?>
<div class="z4-footer">
	<div class="z4-container">
		<?php if($this->countModules("footer-1-row")):?>
		<div class="z4-footer-1-row uk-grid">
			<div class="uk-width-1-1">
				<jdoc:include type="modules" name="footer-1-row" style="html5" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("footer-2-row-1","footer-2-row-2"))):?>
		<!-- 1:1 这种情况-->
		<div class="z4-footer-2-row uk-grid">
			<div class="uk-width-1-2">
				<jdoc:include type="modules" name="footer-2-row-1" style="xhtml" />
			</div>
			<div class="uk-width-1-2">
				<jdoc:include type="modules" name="footer-2-row-2" style="html5" />
			</div>
		</div>
		
		<!-- 1:5 2:4 3:3 这3种情况-->
		<div class="z4-footer-2-row uk-grid">
			<div class="uk-width-1-2">
				<jdoc:include type="modules" name="footer-2-row-1" style="xhtml" />
			</div>
			<div class="uk-width-1-2">
				<jdoc:include type="modules" name="footer-2-row-2" style="html5" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("footer-3-row-1","footer-3-row-2","footer-3-row-3"))):?>
		
		<!-- -->
		<div class="z4-footer-3-row uk-grid">
			<div class="uk-width-1-3">
				<jdoc:include type="modules" name="footer-3-row-1" style="html5" />
			</div>
			<div class="uk-width-1-3">
				<jdoc:include type="modules" name="footer-3-row-2" style="html5" />
			</div>
			<div class="uk-width-1-3">
				<jdoc:include type="modules" name="footer-3-row-3" style="html5" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("footer-4-row-1","footer-4-row-2","footer-4-row-3","footer-4-row-4"))):?>	
		<div class="z4-footer-4-row uk-grid">
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="footer-4-row-1" style="html5" />
			</div>
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="footer-4-row-2" style="html5" />
			</div>
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="footer-4-row-3" style="html5" />
			</div>
			<div class="uk-width-1-4">
				<jdoc:include type="modules" name="footer-4-row-4" style="html5" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("footer-5-row-1","footer-5-row-2","footer-5-row-3","footer-5-row-4","footer-5-row-5"))):?>	
		<div class="z4-footer-5-row uk-grid">
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="footer-5-row-1" style="html5" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="footer-5-row-2" style="html5" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="footer-5-row-3" style="html5" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="footer-5-row-4" style="html5" />
			</div>
			<div class="uk-width-1-5">
				<jdoc:include type="modules" name="footer-5-row-5" style="html5" />
			</div>
		</div>
		<?php endif;?>

		<?php if($this->countModules(array("footer-6-row-1","footer-6-row-2","footer-6-row-3","footer-6-row-4","footer-6-row-5","footer-6-row-6"))):?>	
		<div class="z4-footer-6-row uk-grid">
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="footer-6-row-1" style="html5" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="footer-6-row-2" style="html5" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="footer-6-row-3" style="html5" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="footer-6-row-4" style="html5" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="footer-6-row-5" style="html5" />
			</div>
			<div class="uk-width-1-6">
				<jdoc:include type="modules" name="footer-6-row-6" style="html5" />
			</div>
		</div>
		<?php endif;?>
	</div>
</div>

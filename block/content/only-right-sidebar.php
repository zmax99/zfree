<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div id="t3-mainbody" class="container t3-mainbody">
	<div class="uk-grid">
		
		<div class="uk-width-3-4">
			<!-- MAIN CONTENT -->
			<div id="t3-content" class="t3-content col-xs-12">
				<?php $tpl->loadBlock('content/content'); ?>
			</div>
			<!-- //MAIN CONTENT -->
		</div>
		<div class="uk-width-1-4">	
			<div><jdoc:include type="modules" name="sidebar-right1" style="none" /></div>
			<div><jdoc:include type="modules" name="sidebar-right2" style="none" /></div>
			<div><jdoc:include type="modules" name="sidebar-right3" style="none" /></div>
		</div>
	</div>
</div> 
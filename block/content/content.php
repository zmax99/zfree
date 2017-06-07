<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div id="t3-mainbody" class="container t3-mainbody">
	<div class="content-top">
		<?php $tpl->loadBlock('content/content-top'); ?>
	</div>
	<div id="t3-content" class="t3-content col-xs-12">
		<jdoc:include type="message" />
		<jdoc:include type="component" />
	</div>
	<div class="content-bottom">
		<?php $tpl->loadBlock('content/content-bottom'); ?>
	</div>
</div> 
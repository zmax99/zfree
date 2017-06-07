<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if(0):?>
<!-- 头部信息 -->
<header id="z4-header" class="z4-container-fluid z4-header">
	<div class="z4-top-3-row uk-grid">
		<?php if($this->countModules("logo")):?>
			<div class="z4-logo-1-row uk-grid">
				<div class="uk-width-4-6">
					<jdoc:include type="modules" name="logo" style="html5" />
				</div>
			</div>
		<?php endif;?>
		<?php if($this->countModules("search")):?>
			<div class="z4-logo-1-row uk-grid">
				<div class="uk-width-2-6">
					<jdoc:include type="modules" name="search" style="html5" />
				</div>
			</div>
		<?php endif;?>
	</div>
</header>
<!-- //HEADER -->
<?php endif;?>
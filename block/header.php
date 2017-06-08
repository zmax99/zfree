<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$logoImage="templates/zfree/images/logo.png";
$siteName="ZFree自由模板";
$slogan="为中国Joomla用户打造的免费模板";
$headright=0;
?>
<!-- HEADER -->
<div class="z4-container">
	<div class="uk-grid">
		<div class="uk-width-3-5 logo">
			<!-- LOGO -->
			<?php if($this->countModules("logo")):?>
				<jdoc:include type="modules" name="logo" style="no" />
			<?php else:?>
			<div class="logo-type-text">
				<a href="<?php echo JURI::base(true) ?>" title="<?php echo strip_tags($siteName) ?>">
					<img class="logo-img" src="<?php echo JURI::base(true) . '/' . $logoImage ?>" alt="<?php echo strip_tags($siteName) ?>" />
					<span><?php echo $siteName ?></span>
				</a>
				<small class="site-slogan"><?php echo $slogan ?></small>
			</div>	
			<?php endif;?>
		</div>
		<!-- //LOGO -->

		
		<div class="uk-width-2-5">
			<?php if ($this->countModules('head-search')) : ?>
				<!-- HEAD SEARCH -->
				<div class="head-search ">
					<jdoc:include type="modules" name="head-search" style="raw" />
				</div>
				<!-- //HEAD SEARCH -->
			<?php endif ?>

			<?php if ($this->countModules('languageswitcher')) : ?>
				<!-- LANGUAGE SWITCHER -->
				<div class="languageswitcher">
					<jdoc:include type="modules" name="<?php $this->_p('languageswitcher') ?>" style="raw" />
				</div>
				<!-- //LANGUAGE SWITCHER -->
			<?php endif ?>
		</div>
		

	</div>

<!-- //HEADER -->
</div>

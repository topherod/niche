<?php
/**
 * Template part for custom header nav for mobile off canvas
 *
 */

?>

<ul class="menu vertical">
	<li class="menu-item menu-item-has-children js-accoridion-target js-accordion-trigger"><a href="#">About</a>
		<span class='plus'>+</span>
		<span class='minus'>&#8211;</span>
		<?php custom_header_nav_mobile('about') ?>
	</li>
	<li class="menu-item menu-item-has-children js-accoridion-target js-accordion-trigger"><a href="#">Designation</a>
		<span class='plus'>+</span>
		<span class='minus'>&#8211;</span>
		<?php custom_header_nav_mobile('designation') ?>
	</li>
	<li class="menu-item"><a href="/knowledge-center">Knowledge Center</a>
	</li>
	<li class="menu-item menu-item-has-children js-accoridion-target js-accordion-trigger"><a href="#">Patient &amp; Family</a>
		<span class='plus'>+</span>
		<span class='minus'>&#8211;</span>
		<?php custom_header_nav_mobile('patient-family') ?>
	</li>
	<li class="menu-item menu-item-has-children js-accoridion-target js-accordion-trigger"><a href="#">News &amp; Events</a>
		<span class='plus'>+</span>
		<span class='minus'>&#8211;</span>
		<?php custom_header_nav_mobile('news-events') ?>
	</li>
	<li class="menu-item menu-item-has-children js-accoridion-target js-accordion-trigger"><a href="#">Contact</a>
		<span class='plus'>+</span>
		<span class='minus'>&#8211;</span>
		<?php custom_header_nav_mobile('contact') ?>
	</li>
</ul>



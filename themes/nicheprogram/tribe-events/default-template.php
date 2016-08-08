<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>
<div class="row">
  <aside class="submenu-container">
		<div class="submenu-mobile-trigger js-submenu-mobile-trigger">
      <span class="js-active-level-menu">News &amp; Events</span><span class='plus'>+</span>
      <span class="js-top-level-menu">News &amp; Events Menu</span><span class="minus">&#8211;</span>
      </div>
    <div class="submenu-wrapper">
		<div class="submenu-mobile-target js-submenu-mobile-target"><?php custom_submenu_nav('news-events'); ?></div>
    </div>
	</aside>
	<div id="page" role="main">
		<article class="main-content">
			<div class="row">
	      <div class="columns large-12 medium-12 smedium-12">
					<div id="tribe-events-pg-template">
						<?php tribe_events_before_html(); ?>
						<?php tribe_get_view(); ?>
						<?php tribe_events_after_html(); ?>
					</div> <!-- #tribe-events-pg-template -->
				</div>
			</div>
		</article>
	</div>
</div>

<?php
get_footer();

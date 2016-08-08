<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="off-canvas position-left" id="mobile-menu" data-off-canvas data-position="left" role="navigation">
  <div class="off-canvas__top-bar">
 		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo.png"></a>
  </div>

	<?php get_template_part('template-parts/custom-header-nav--mobile'); ?>

</nav>

<div class="off-canvas-content" data-off-canvas-content>

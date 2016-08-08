<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="title-bar">
			<button class="hamburger-icon" type="button" data-toggle="mobile-menu">
				<span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="header-logo--mobile" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo.png"></a>
			</div>
			<a href="/search" class="fa fa-search mobile-search-icon <?php if ( is_page_template( 'page-templates/page-search.php' ) || is_search() ) { echo "active"; } ?> " aria-hidden="true"></a>
		</div>
		<?php if (!is_front_page()) { ?>
		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-wrapper js-header">
				<?php  get_template_part('template-parts/social-share-bar');?>
				<div class="top-bar-left">
					<a class="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="header-logo" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo.png"></a>
				</div>
				<div class="top-bar-right">
			 		<?php get_template_part('template-parts/custom-header-nav'); ?>
					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</nav>
		<?php } ?>
	</header>
	<div class="menu-overlay js-submenu-exit"></div>
	
	<main class="container">
		<?php do_action( 'foundationpress_after_header' );

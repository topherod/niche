<?php
/**
 * Template part for main footer content
 *
 */

?>
<div class="row">
	<div class="columns large-3">
		<div class="footer-content footer-content__contact">
			<img class="footer-logo" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo.png">
			<p>250 Park Avenue South</p>
			<p>New York, NY</p>
			<p>212-998-5445</p>
			<p>Fax: 914-612-9168</p>
			<img class="footer-logo--secondary" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo-NYU.png">
		</div>
	</div>

	<div class="columns large-9">
		<div class="row">
			<div class="footer-content">
				<div class="columns large-3 medium-3 small-6">
					<h3 class="menu-header">About</h3>
					<?php custom_footer_nav('about') ?>
				</div>
				<div class="columns large-3 medium-3 small-6">
					<h3 class="menu-header">Designation</h3>
					<?php custom_footer_nav('designation') ?>

				</div>
				<div class="columns large-3 medium-3 small-6">
					<h3 class="menu-header">Patients &amp; Caregivers</h3>
					<?php custom_footer_nav('patient-family') ?>

				</div>
				<div class="columns large-3 medium-3 small-6">
					<h3 class="menu-header">News &amp; Events</h3>
					<?php custom_footer_nav('news-events') ?>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-content footer-content__social-share">
  <?php $social_accounts = new WP_QUERY(array(
    'post_type' => 'social-accounts'
  )); ?>
  <?php if ( $social_accounts->have_posts() ) { ?>
    <?php while ($social_accounts->have_posts()) : $social_accounts->the_post(); ?>
      
    <a href="<?php the_field('url_to_social_account'); ?>" class="sharing-link" target="_blank" >
        <i class="fa fa-<?php the_field('account_type'); ?>" aria-hidden="true"></i>
    </a>

    <?php endwhile; ?>
  <?php } ?>
  <?php wp_reset_query(); ?>
		<img class="footer-logo--secondary" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo-NYU.png">
	</div>

</div>
<?php
/**
 * Template part for social share bar on desktop header nav
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="social-share-bar">
  <?php foundationpress_top_top_bar(); ?>

  <?php $social_accounts = new WP_QUERY(array(
    'post_type' => 'social-accounts'
  )); ?>
  <?php if ( $social_accounts->have_posts() ) { ?>
  <div class="header-social-accounts">
      <?php while ($social_accounts->have_posts()) : $social_accounts->the_post(); ?>
        
      <a href="<?php the_field('url_to_social_account'); ?>" class="sharing-link" target="_blank" >
          <i class="fa fa-<?php the_field('account_type'); ?>" aria-hidden="true"></i>
      </a>

      <?php endwhile; ?>
  </div>
  <?php } ?>
  <?php wp_reset_query(); ?>
	<a href="/search"><i class="fa fa-search <?php if ( is_page_template( 'page-templates/page-search.php' ) || is_search() ) { echo "active"; } ?> " aria-hidden="true"></i></a>
</div>

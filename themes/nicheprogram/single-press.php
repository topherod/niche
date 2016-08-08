<?php
/**
 * The template for displaying single press posts
 *
 */

get_header(); ?>

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
	<nav aria-label="You are here:" role="navigation">
	  <ul class="breadcrumbs">
	    <li>News &amp; Events</li>
	    <li><a href="/press-releases">Press Releases</a></li>
	  </ul>
	</nav>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="sub-header"><h6><?php the_date('F j, Y') ?> | FOR IMMEDIATE RELEASE</h6></div>
		</header>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<div class="callout-about-niche">
			<h3>About NICHE</h3>
			<p>NICHE (Nurses Improving Care for Healthsystem Elders) is an international program designed to help improve the care of older adults. The vision of NICHE is for all patients 65-and-over to be given sensitive and exemplary care. The mission of NICHE is to provide principles and tools to stimulate a change in the culture of healthcare organizations to achieve patient-centered care for older adults. NICHE, based at the NYU College of Nursing, has over 700 hospitals and other healthcare organization members from the U.S., Canada, Bermuda, Australia, and Singapore.</p>
		</div>
		<footer>
			<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
</div>
<?php get_footer();

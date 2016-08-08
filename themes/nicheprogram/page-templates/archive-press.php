<?php
/*
 Template Name: Press Archive
*/

$type = 'press';
$args=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
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
		<article class="main-content">
	  <header>
    	<h1 class="entry-title"><?php the_title(); ?></h1>
   	</header>
		<?php if ( have_posts($args) ) : ?>
					<div class="row">
            <?php if( $my_query->have_posts() ) {
               while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <div class="columns large-6 medium-12 smedium-12 press-item">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>  
                  <h6><?php the_date('m/d/y')?></h6>
                </div> 
                <?php
              endwhile;
            } ?>
            <?php wp_reset_query(); ?>
           </div>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php } ?>

		</article>
	</div>
</div>

<?php get_footer();

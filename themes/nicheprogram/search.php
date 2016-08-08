<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<?php get_sidebar('submenu'); ?>
	<div id="page" role="main">
		<article <?php post_class('main-content') ?>>
		<?php do_action( 'foundationpress_before_content' ); ?>

		<p class="search-breadcrumb"><a href="/search">Search</a> > “<?php echo get_search_query(); ?>”</p>
		<h2>Search</h2>

		<div class="search-page">
			<?php get_search_form(); ?>


			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-search', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif;?>

			<?php do_action( 'foundationpress_before_pagination' ); ?>

			<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>

				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php } ?>

		</div>

	<?php do_action( 'foundationpress_after_content' ); ?>
		</article>
	</div>
</div>
<?php get_footer();

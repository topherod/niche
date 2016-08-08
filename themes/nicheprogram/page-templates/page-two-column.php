<?php
/*
Template Name: Two Column Layout
*/


 get_header(); ?>
 <div class="row">
    <?php get_sidebar('submenu'); ?>
   <div id="page" role="main">
     <?php do_action( 'foundationpress_before_content' ); ?>
     <?php while ( have_posts() ) : the_post(); ?>
       <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
         <header>
           <h1 class="entry-title"><?php the_title(); ?></h1>
         </header>
         <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
         <div class="entry-content">
           <?php the_content(); ?>
         </div>
         <?php if( have_rows('two_column_layout') ): ?>
         <section class="two-column-layout">
	        <?php while( have_rows('two_column_layout') ): the_row(); 
	        $left_column = get_sub_field('left_column');
	        $right_column = get_sub_field('right_column');
	        ?>
	         	<div class="row row--two-column">
	       			<div class="column smedium-6 medium-6 large-6 xlarge-6">
	       					<?php echo $left_column ?>
	       			</div>
	       			<div class="column smedium-6 medium-6 large-6 xlarge-6">
	       					<?php echo $right_column ?>
	       			</div>
	        	</div>
	        	<?php if(get_sub_field('full_column')) : ?>
	          	<div class="row row--full-column">
	          		<div class="coluumn">
	          			<?php echo get_sub_field('full_column') ?>
	          		</div>
	          	</div>
	        	<?php endif ?>
	      	<?php endwhile; ?>
        </section>
        <?php endif; ?>
        
        <?php if(get_field('callout')): ?>
          <?php get_template_part( 'template-parts/callout' ); ?>
        <?php endif ?>

        <footer>
         <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
         <p><?php the_tags(); ?></p>
       </footer>
       <?php do_action( 'foundationpress_page_before_comments' ); ?>
       <?php comments_template(); ?>
       <?php do_action( 'foundationpress_page_after_comments' ); ?>
     </article>
   <?php endwhile;?>
   <?php do_action( 'foundationpress_after_content' ); ?>
 </div>
</div>
<?php get_footer();

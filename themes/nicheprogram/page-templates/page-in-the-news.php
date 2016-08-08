<?php
/*
Template Name: In the News
*/

 $type = 'news';
 $args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'caller_get_posts'=> 1
 );
 $my_query = null;
 $my_query = new WP_Query($args);
 
 get_header(); 
 ?>
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
         <div class="news-items-container">
           <div class="row">
            <?php if( $my_query->have_posts() ) {
              while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <div class="columns large-6 medium-12 smedium-12 news-item">
                  <a href="<?php the_field('link_to_article') ?>" target="_blank">
                    <h4><?php the_title(); ?></h4>  
                    <?php if(the_field('custom_title')) { ?>
                    <h5><?php the_field('custom_title'); ?></h5>
                    <?php } ?>
                    <h6><?php the_date('m/d/y')?></h6>
                  </a>
                </div>
                <?php
              endwhile;
            } ?>
            <?php wp_reset_query(); ?>
           </div>
         </div>

         <div class="see-more">
          <div class="row">
            <div class="columns smedium-8 medium-9 large-6 xlarge-5 smedium-centered">
              <div class="text-area">
              <h4>See Archived News Articles</h5>
              <a href="/archived-news-articles">See More</a>
              </div>
            </div>
          </div>
         </div>

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

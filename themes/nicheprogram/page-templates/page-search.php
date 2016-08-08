<?php
/*
Template Name: Search
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
            <div class="search-page">
             <?php get_search_form(); ?>
           </div>
         </div>
       </article>
     <?php endwhile;?>
     <?php do_action( 'foundationpress_after_content' ); ?>
   </div>
</div>
<?php get_footer();

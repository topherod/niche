<?php
/*
Template Name: Accordion
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
        
          <?php if( have_rows('accordion_item') ): ?>
           <section class="accordion-container">
            <ul class="accordion" data-accordion data-allow-all-closed="true">
                <?php while( have_rows('accordion_item') ): the_row(); 
                $accordion_title = get_sub_field('accordion_item_title');
                $accordion_content = get_sub_field('accordion_item_content');
                ?>
                <li class="accordion-item" data-accordion-item>
                  <a href="#" class="accordion-title"><?php echo $accordion_title ?></a>
                  <div class="accordion-content" data-tab-content>
                    <?php echo $accordion_content ?>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
          </section>
        <?php endif; ?>

        <?php if(get_field('content_after_accordion_items')) : ?>
          <div class="entry-content">
            <?php the_field('content_after_accordion_items') ?>
          </div>
        <?php endif ?>
        
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

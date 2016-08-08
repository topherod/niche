<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<div class="homepage-social-header">
  <?php  get_template_part('template-parts/social-share-bar');?>
</div>

<div id="page-full-width homepage" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

  <section class="homepage-header" style="background-image: url('<?php the_field('homepage_header_image'); ?>');">
    <div class="logo">
      <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/niche-logo-homepage.png">
      <h1>Nurses Improving Care for Healthsystem Elders</h1>
    </div>
    <div class="homepage-header-text">
      <?php the_field('homepage_header_text'); ?>
    </div>
  </section>

  <section class="homepage-menu">
    <div class="homepage-navigation top-bar">
      <!-- HOMEPAGE NAVIGATION GOES HERE -->
      <?php get_template_part('template-parts/custom-header-nav'); ?>
    </div>
  </section>

  <section class="homepage-section-one">
    <h4 class="homepage-section-one-title"><?php the_field('homepage_section_one_title'); ?></h4>
    <div class="homepage-section-one-description">
      <?php the_field('homepage_section_one_description'); ?>
    </div>
    <a href="<?php the_field('homepage_section_one_cta_link'); ?>" class="homepage-section-one-cta button"><?php the_field('homepage_section_one_cta_text'); ?></a>

  </section>

  <section class="homepage-icons">

  <?php if( have_rows('homepage_icons') ): ?>
    <div class="row icons">
    <?php while( have_rows('homepage_icons') ): the_row(); 
      // vars
      $icon_image = get_sub_field('homepage_icon_image');
      $icon_content = get_sub_field('homepage_icon_title');
      $icon_link = get_sub_field('homepage_icon_link');
      ?>
      <div class="icon small-6 medium-4 columns">
        <?php if( $icon_link ): ?>
          <a href="<?php echo $icon_link; ?>">
        <?php endif; ?>

        <?php if( !empty($icon_image) ): ?>
          <img src="<?php echo $icon_image['url']; ?>" alt="<?php echo $icon_image['alt'] ?>" />
        <?php endif; ?>

          <?php echo $icon_content; ?>

        <?php if( $icon_link ): ?>
          </a>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
    </div>
  <?php endif; ?>

  </section>

  <section class="homepage-slider">

    <?php if( have_rows('homepage_slider') ): ?>
      <?php $count = 0; ?>
    <div class="orbit" role="region" aria-label="The Latest Updates from NICHE" data-orbit>
      <ul class="orbit-container">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><i class="fa fa-chevron-left"></i></button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span><i class="fa fa-chevron-right"></i></button>
        <?php while( have_rows('homepage_slider') ): the_row(); 
          // vars
          $slider_image = get_sub_field('homepage_slider_image');
          $slider_title = get_sub_field('homepage_slider_title');
          $slider_content = get_sub_field('homepage_slider_description');
          $slider_cta_link = get_sub_field('homepage_slider_cta_link');
          $slider_cta_text = get_sub_field('homepage_slider_cta_text');
          $slider_color = get_sub_field('homepage_slider_background_color');
        ?>
        <li class="<?php if ($count == 0) { ?>is-active<?php } ?> orbit-slide <?php if( !empty($slider_image) ) { ?>has-image<?php } else { ?>no-image<?php } ?> <?php echo $slider_color; ?>">
          <?php if( !empty($slider_image) ): ?>
          <div class="homepage-slider-image">
            <img class="orbit-image" src="<?php echo $slider_image['url']; ?>" alt="<?php echo $slider_image['alt'] ?>" />
          </div>
          <?php endif; ?>
          <div class="orbit-content">
            <h5 class="homepage-slider-title"><?php echo $slider_title; ?></h5>
            <?php echo $slider_content; ?>
            <?php if( $slider_cta_link ): ?>
              <a href="<?php echo $slider_cta_link; ?>" class="button homepage-slider-button"><?php echo $slider_cta_text; ?></a>
            <?php endif; ?>
          </div>
        </li>
        <?php $count++; ?>
        <?php endwhile; ?>
      </ul>
      <nav class="orbit-bullets">
        <?php $count = 0; ?>
        <?php while( have_rows('homepage_slider') ): the_row(); 
          $slider_title = get_sub_field('homepage_slider_title');
        ?>
        <button class="<?php if ($count == 0) { ?>is-active<?php } ?>" data-slide="<?php echo $count; ?>"><span class="show-for-sr"><?php echo $slider_title; ?></span><?php if ($count == 0) { ?><span class="show-for-sr">Current Slide</span><?php } ?></button>
        <?php $count++; ?>
        <?php endwhile; ?>
      </nav>
    </div>
    <?php endif; ?>

  </section>

  <section class="homepage-important-numbers" style="background-image: url('<?php the_field('homepage_important_number_background_image'); ?>')">

  <?php if( have_rows('homepage_important_numbers') ): ?>
    <div class="row numbers">
    <?php while( have_rows('homepage_important_numbers') ): the_row(); 
      // vars
      $number = get_sub_field('homepage_important_number');
      $number_description = get_sub_field('homepage_important_number_description');
      ?>
      <div class="number small-12 medium-6 large-3 columns">

        <div class="important-number">
          <?php echo $number; ?>
        </div>
        <div class="important-number-description">
          <?php echo $number_description; ?>
        </div>

      </div>
    <?php endwhile; ?>
    </div>
  <?php endif; ?>

  </section>



<?php endwhile;?>


</div>

<?php get_footer();

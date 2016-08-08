<?php
/**
 * Template part for Callout section
 *
 */

?>

<div class="callout-container">
  <div class="row">
  	<?php if(get_field('callout_image')) { ?>
      <div class="callout-content columns large-7 medium-8 smedium-7 text-left">
        <h1><?php echo get_field('callout_title') ?></h1>
        <a href="<?php echo get_field('callout_link')?>" class='callout-button'>Explore</a>
      </div>
      <?php $image_url = get_field('callout_image') ?>
      <div class="callout-image columns large-5 medium-4 smedium-5" style="background-image: url('<?php echo $image_url?>')">
      </div>
    <?php } else { ?>
			<div class="callout-content columns large-12 text-center">
        <h1><?php echo get_field('callout_title') ?></h1>
        <a href="<?php echo get_field('callout_link')?>" class='callout-button'>Explore</a>
      </div>
  	<?php } ?>
  </div>
</div>

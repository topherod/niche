<?php
/*
Template Name: Table 
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
        
          <?php if( have_rows('category_group') ): ?>
           <section class="table-container">
            <table>
            	<tr>
            		<th></th>
            		<th>Without NICHE</th>
            		<th>With NICHE</th>
            	</tr>
            	
            	<?php 
  							$without_value_array = array();
                $with_value_array = array();
            	 ?>
              
            	<!-- starting custom fields loop -->
              <?php while( have_rows('category_group') ): the_row(); 
								setlocale(LC_MONETARY, 'en_US');
                $category_title = get_sub_field('category_title');

              ?>
	              <tr class="table__category-title">
	              	<td><h5 class="category-title"><?php echo $category_title ?></h5></td>
	              	<td></td>
	              	<td></td>
	              </tr>
	              <?php 
	                while( have_rows('value_item')) : the_row();
		                $value_content = get_sub_field('value_content');
		                $value_subtext = get_sub_field('value_subtext');
		                $without_niche_value = get_sub_field('without_niche_value');
		                $with_niche_value = get_sub_field('with_niche_value');

		                array_push($without_value_array, $without_niche_value);
										array_push($with_value_array, $with_niche_value);

										$without_niche_dollar = money_format('%.0n', $without_niche_value);
										$with_niche_dollar = money_format('%.0n', $with_niche_value);
	              ?>
		              <tr class="table__value-item">
			            	<td>
			            		<p class="value-content"><?php echo $value_content ?></p>
			            		<p class="value-subtext"><?php echo $value_subtext ?></p>		
			            	</td>
			            	<td class="value-amount"><?php echo $without_niche_dollar ?></td>
			            	<td class="value-amount"><?php echo $with_niche_dollar ?></td>
			            </tr>
            		<?php endwhile; ?>
            	<?php endwhile; ?>
            	<!-- end custom fields loop -->

							<?php 
            		// finding total value amounts here
            		$without_total = array_sum($without_value_array);
            		$with_total = array_sum($with_value_array);
            		$without_total_dollar = money_format('%.0n', $without_total); 
            		$with_total_dollar = money_format('%.0n', $with_total); 
            	?>

            	<tr class="table__value-item">
            		<td class="category-title"><h5>Collaboration, Support & Peer Advice</h5></td>
            		<td class="value-amount">PRICELESS</td>
            		<td class="value-amount">PRICELESS</td>
            	</tr>
            	<tr>
            		<td><h3>Total</h3></td>
            		<td class="value-amount"><?php echo $without_total_dollar ?></td>
            		<td class="value-amount"><?php echo $with_total_dollar ?></td>
            	</tr>
            </table>
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
<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<nav aria-label="You are here:" role="navigation">
  <ul class="breadcrumbs">
    <li>News &amp; Events</li>
    <li><a href="/calendar">Calendar</a></li>
  </ul>
</nav>

<div id="tribe-events-content" class="tribe-events-single">

	<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

	<div class="tribe-events-schedule tribe-clearfix">
		<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
	</div>


	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
			<div class="row">
			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div>
		</div>

	<?php endwhile; ?>

	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->

<div class="see-more">
	<div class="row">
	  <div class="columns smedium-8 medium-9 large-6 xlarge-5 smedium-centered">
	    <div class="text-area">
	    <h4>See More Events</h4>
	    <a href="/calendar/list">See More</a>
	    </div>
	  </div>
	</div>
</div>

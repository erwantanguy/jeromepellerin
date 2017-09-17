<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();
$start_time = tribe_get_start_date( null, false, "l d F \à G\hi" );
?>
<header class="row">
	<figure class="col-md-3">
		<?php //echo tribe_event_featured_image( null, 'oeuvres' ) ?>
		<?php the_post_thumbnail('events'); ?>
	</figure>
	<div class="col-md-9">
		<h1 class="tribe-events-list-event-title">
			<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
				<?php the_title() ?>
			</a>
		</h1>
		<?php if ( tribe_get_cost() ) : ?>
			<div class="tribe-events-event-cost">
				<span><?php echo tribe_get_cost( null, true ); ?></span>
			</div>
		<?php endif; ?>
		<?php do_action( 'tribe_events_before_the_event_title' ) ?>

		<?php do_action( 'tribe_events_after_the_event_title' ) ?>
		
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		<div class="tribe-events-event-meta">
			<div class="author <?php echo esc_attr( $has_venue_address ); ?>">
		
				<!-- Schedule & Recurrence Details -->
				<div class="tribe-event-schedule-details">
					<h2><i class="fa fa-calendar"></i> <?php echo $start_time; ?></h2>
					<?php //echo tribe_events_event_schedule_details() ?>
				</div>
		
				<?php if ( $venue_details ) : ?>
					<!-- Venue Display Info -->
					<div class="tribe-events-venue-details">
						<?php echo implode( ', ', $venue_details ); ?>
					</div> <!-- .tribe-events-venue-details -->
				<?php endif; ?>
		
			</div>
		</div><!-- .tribe-events-event-meta -->
		<?php do_action( 'tribe_events_after_the_meta' ) ?>
		<?php do_action( 'tribe_events_before_the_content' ) ?>
		<div class="tribe-events-list-event-description tribe-events-content">
			<?php //echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
			<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="pull-right btn btn-default" rel="bookmark"><?php esc_html_e( 'Find out more', 'the-events-calendar' ) ?></a>
		</div><!-- .tribe-events-list-event-description -->
		<?php
		do_action( 'tribe_events_after_the_content' );?>
	</div>
</header>
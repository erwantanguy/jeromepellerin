<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
echo '<section class="row">';
do_action( 'tribe_events_before_template' );

// Tribe Bar
tribe_get_template_part( 'modules/bar' );
if ( function_exists('yoast_breadcrumb') ) 
	{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb col-md-12 hidden-xs"><i class="fa fa-compass" aria-hidden="true"></i> ','</p>');}
// Main Events Content
tribe_get_template_part( 'month/content' );

do_action( 'tribe_events_after_template' );
echo '</section>';

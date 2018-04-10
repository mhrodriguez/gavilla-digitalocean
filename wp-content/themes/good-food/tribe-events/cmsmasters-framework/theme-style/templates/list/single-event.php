<?php
/**
 * @cmsmasters_package 	Good Food
 * @cmsmasters_version 	1.0.0
 */


$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

?>

<div class="cmsmasters_events_list_event_wrap">
	<div class="cmsmasters_event_big_date">
		<div class="cmsmasters_event_big_month"><?php echo tribe_get_start_date(null, false, 'd') . ' ' . tribe_get_start_date(null, false, 'F'); ?></div>
		<div class="cmsmasters_event_big_week"><?php echo tribe_get_start_date(null, false, 'l'); ?></div>
	</div>
	<div class="tribe-events-event-image">
		<?php good_food_thumb(get_the_ID(), 'post-thumbnail', false, true, true, false, false, true, false); ?>
	</div>
	<div class="cmsmasters_events_list_event_info">
		<!-- Event Title -->
		<?php do_action( 'tribe_events_before_the_event_title' ) ?>
		<h2 class="tribe-events-list-event-title entry-title summary">
			<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
				<?php the_title() ?>
			</a>
		</h2>
		<?php do_action( 'tribe_events_after_the_event_title' ) ?>
		
		<!-- Event Meta -->
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		<div class="tribe-events-event-meta vcard">
			<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

				<?php if ( $venue_details ) : ?>
					<!-- Venue Display Info -->
					<div class="tribe-events-venue-details">
						<?php echo implode( ', ', $venue_details ); ?>
					</div> <!-- .tribe-events-venue-details -->
				<?php endif; ?>
				
			</div>
		</div><!-- .tribe-events-event-meta -->
	</div>
	
	<div class="cmsmasters_events_list_event_info">
		<?php do_action( 'tribe_events_before_the_meta' ) ?>
		<div class="tribe-events-event-meta vcard">
			<!-- Schedule & Recurrence Details -->
			<div class="updated published time-details">
				<div class="cmsmasters_event_day"><?php echo tribe_get_start_date(null, false, 'l'); ?></div>
				<div class="cmsmasters_event_time"><?php echo tribe_get_start_time(); ?> - <?php echo tribe_get_end_time(); ?></div>
			</div>
		</div>
	</div>
	
	<div class="cmsmasters_events_list_event_info">
		<?php if ( tribe_get_cost() ) : ?> 
			<div class="tribe-events-event-cost">
				<?php echo tribe_get_cost( null, true ); ?>
			</div>
		<?php endif; ?>
		
		<?php if (get_the_terms(get_the_id(), 'tribe_events_cat')) {
			$cmsmasters_tribe_events_cat_count = sizeof(get_the_terms(get_the_id(), 'tribe_events_cat'));
			
			echo '<div class="cmsmasters-tribe-events-event-cat">' . 
				good_food_get_the_category_list(get_the_id(), 'tribe_events_cat', ', ') . 
			'</div>';
		} ?>
	</div>
	<div class="cmsmasters_events_more">
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more button" rel="bookmark"><?php esc_html_e( 'Read more', 'good-food' ) ?></a>
	</div>
</div>

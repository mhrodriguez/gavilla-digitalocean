<?php
/**
 * @cmsmasters_package 	Good Food
 * @cmsmasters_version 	1.0.0
 */


$organizer_id = get_the_ID();
$email = tribe_get_organizer_email();
$telephone    = tribe_get_organizer_phone();
$website_link = tribe_get_organizer_website_link();


while( have_posts() ) : the_post(); ?>
<div class="tribe-events-organizer">
	<div class="cmsmasters_events_organizer_header clearfix">
		<div class="cmsmasters_events_organizer_header_left clearfix">
			<!-- Organizer Title -->
			<?php do_action( 'tribe_events_single_organizer_before_title' ) ?>
			<h4 class="tribe-organizer-name entry-title author fn org"><?php echo tribe_get_organizer( $organizer_id ); ?></h4>
			<?php do_action( 'tribe_events_single_organizer_after_title' ) ?>
			
			<div class="tribe-events-event-meta">
				<!-- Organizer Meta -->
				
				<?php do_action('tribe_events_single_organizer_before_the_meta'); ?>
				
				<div class="organizer-address">
					<?php if ( $email ) : ?>
					<span class="mail cmsmasters-icon-mail">
						<?php echo wp_kses( $email, 'post' ); ?>
					</span>
					<?php endif; ?>

					<?php if ( $telephone ): ?>
						<span class="tel cmsmasters-icon-phone-4">
							<?php echo esc_html( $telephone ); ?>
						</span>
					<?php endif; ?>

					<?php if ( $website_link ): ?>
						<span class="url cmsmasters-icon-globe-alt-2">
							<?php echo wp_kses( $website_link, 'post' ); ?>
						</span>
					<?php endif; ?>
				
				</div><!-- .organizer-address -->
				
				<?php do_action('tribe_events_single_organizer_after_the_meta'); ?>
			</div>
		</div>
		<div class="cmsmasters_events_organizer_header_right clearfix">
			<div class="tribe-events-back">
				<a class="cmsmasters_theme_icon_date" href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( esc_html__( 'Back to %s', 'tribe-events-calendar-pro' ), tribe_get_event_label_plural() ); ?></a>
			</div>
		</div>
	</div>
	<?php do_action( 'tribe_events_single_organizer_before_organizer' ) ?>
	<div class="tribe-events-organizer-meta vcard tribe-clearfix">
		<!-- Organizer Featured Image -->
		<?php 
		if (has_post_thumbnail()) {
			echo '<div class="cmsmasters_events_organizer_meta_img">' . 
				tribe_event_featured_image(null, 'cmsmasters-full-masonry-thumb') . 
			'</div>';
		}
		?>

		<!-- Organizer Content -->
		<?php if( get_the_content() ) { ?>
		<div class="tribe-organizer-description tribe-events-content entry-content">
			<?php the_content(); ?>
		</div>
		<?php } ?>
	</div>
	<!-- .tribe-events-organizer-meta -->
	<?php do_action( 'tribe_events_single_organizer_after_organizer' ) ?>

	<!-- Upcoming event list -->
	<?php do_action('tribe_events_single_organizer_before_upcoming_events') ?>

	<?php
	// Use the tribe_events_single_organizer_posts_per_page to filter the number of events to get here.
	echo tribe_organizer_upcoming_events( $organizer_id ); ?>

	<?php do_action('tribe_events_single_organizer_after_upcoming_events') ?>
	
</div><!-- .tribe-events-organizer -->
<?php do_action( 'tribe_events_single_organizer_after_template' ) ?>
<?php endwhile; ?>
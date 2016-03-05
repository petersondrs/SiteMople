

<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $more;
$more = false;



?>

<div class="tribe-events-loop vcalendar">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Month / Year Headers -->
		<?php tribe_events_list_the_date_headers(); ?> 

		<!-- Event  -->
		<?php 
			if (get_field('list_soon') || $list_days = null || !$list_days) {
				$list_soonClass = 'hide';
				$list_soonText = '[Em Breve] ';
			}
			else {
				$list_soonClass = '';
				$list_soonText = '';
			}
		?>
		<div id="course_<?php the_ID() ?>" class="course_item <?php echo $list_soonClass ?> <?php tribe_events_event_classes() ?> " name="<?php the_title(); ?>">
			<?php tribe_get_template_part( 'list/single', 'event' ) ?> 
				

		</div><!-- .hentry .vevent -->


		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

</div><!-- .tribe-events-loop -->

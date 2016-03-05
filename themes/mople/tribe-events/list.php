<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php do_action( 'tribe_events_before_template' ); ?>
	<?php $my_query = new WP_Query('page_id=144'); ?> 
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 clearfix" role="main">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block header-post-image" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-11 col-md-offset-1 clearfix" role="main">
					<?php the_content() ?>
				</div>
			</div>	<?php endwhile; ?>
	<!-- Tribe Bar -->
	
	<div class="row combo-list-courses">
			<div class="col-md-11 col-md-offset-1 ">
				<div class="box">
					<div class="col-md-4 text">
						<?php _e('Escolha com facilidade seu curso:', 'mople'); ?>
					</div>
					<div class="col-md-8">
						<select id="course_list" >
					    	<option value="all_posts">Mostrar Todos </option>
							<?php $my_query = new WP_Query('tribe_events_cat=desenvolvimento-humano'); ?>
							<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<option value="course_<?php the_ID(); ?>" class="value" >
								<?php the_title(); ?>
							</option>
							<?php endwhile; ?>
							<?php $my_query = new WP_Query('tribe_events_cat=petroleo-e-gas'); ?>
							<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<option value="course_<?php the_ID(); ?>" class="value" >
								<?php the_title(); ?>
							</option>
							<?php endwhile; ?>
					 	</select>

					</div>
				</div>
			</div>
		    </div>
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.11.3.min.js" ></script>
			<script type="text/javascript">
				$("#course_list").on('change', function () {
			      $('.course_item').hide();
			      $('.tribe-events-list-separator-month').hide();
			    
			    var value = $("#course_list").val();
			    if(value === "all_posts"){
			        $("#course_list .value").each(function(k,v) 
					{
			            var item = $(v).attr("value");
			      		$('#' + item).show();
			      		$('.tribe-events-list-separator-month').show();      
			        });
			    }else{
			      $('#' + this.value).show();
			    }
			    
			});

			</script>
			<div class="row combo-list-courses">
				<div class="col-md-11 col-md-offset-1 ">
					<?php tribe_get_template_part( 'modules/bar' ); ?>

						<!-- Main Events Content -->
					<?php tribe_get_template_part( 'list/content' ); ?>
					
						<div class="tribe-clear"></div>
					
					<?php do_action( 'tribe_events_after_template' ) ?>
					
					<?php echo do_shortcode('[ssba]'); ?>
				</div>
			</div>
	

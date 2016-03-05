<?php
/*
Template Name: Page Mople DNA
*/
?>

<?php get_header(); ?>


    <div class="container">
		<div id="content" class="clearfix">
			<?php $my_query = new WP_Query('page_id=135'); ?> 
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
			</div>
			<?php endwhile; ?>
		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

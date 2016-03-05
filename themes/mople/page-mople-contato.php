<?php
/*
Template Name: Page Mople Contato
*/
?>

<?php get_header(); ?>


    <div class="container">
		<div id="content" class="clearfix">
			<?php $my_query = new WP_Query('page_id=139'); ?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 clearfix" role="main">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block header-post-image" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-11 col-md-offset-1 clearfix" role="main">
          <div class="row">
            <div class="col-md-6">
                 <?php echo do_shortcode('[contact-form-7 id="239" title="Contato PT"]'); ?>
            </div>
            <div class="col-md-6">
					       <?php the_content() ?>
            </div>
          </div>
				</div>
			</div>
			<?php endwhile; ?>
		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

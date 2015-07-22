<?php
/*
Template Name: Page - Mople Blog
*/
?>

<?php get_header(); ?>


    <div class="container">
		<div id="content" class="clearfix">
			<div class="row">
				<div class="col-md-12 clearfix" role="main">
				<?php $my_query = new WP_Query('p=86'); ?> 
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block" />
				<?php endwhile; ?>
				
				</div>
		    </div>
			<?php $my_query = new WP_Query('category_name=blog&showposts=10'); ?> 
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="row blog-posts-list">
					
					<div class="col-md-12 clearfix">
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block img-blog" />

						<div class="text-blog">
							<a href="<?php the_permalink(); ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
							</a>
						</div>
					</div>
					
				</div>
			<?php endwhile; ?>
			

		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

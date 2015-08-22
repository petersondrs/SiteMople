<?php
/*
Template Name: Mople e Voce Cadastro 
*/
?>

<?php get_header(); ?>


    <div class="container">
		<div id="content" class="clearfix">
			<div class="row">
				<?php $my_query = new WP_Query('page_id=145'); ?> 
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block half-image" />
				</div>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					<?php the_content(); ?>
				<?php endwhile; ?>
				</div>
		    </div>
<!--
		    
		    
		    
		    <div class="row">
			    <select>
				    
				<?php $my_query = new WP_Query('tribe_events_cat=cursos-mople'); ?> 
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<option>
					<?php the_title(); ?>
				</option>
				<?php endwhile; ?>
				
			</select>

		    </div>
-->
		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

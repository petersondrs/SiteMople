<?php
/*
Template Name: Pedido Inscricao Via Form
*/
?>

<?php get_header(); ?>


    <div id="container" class="container">
		<div id="content" class="clearfix">
			<div class="row">
				<?php $my_query = new WP_Query('page_id=145'); ?> 
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block header-post-image" />
				</div>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					
				<div  class="<?php echo $_GET["show"] ?>">
					<?php #echo "<p>" . $_GET["postNome"]."</p>"; ?>
					<?php  echo do_shortcode('[contact-form-7 id="269"]');   ?>
				</div>
					
				<?php endwhile; ?>
				</div>
		    </div>

			
		
		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

<?php
/*
Template Name: Mople Petroleo 
*/
?>

<?php get_header(); ?>


    <div class="container">
		<div id="content" class="clearfix">
			<div class="row">
				<?php $my_query = new WP_Query('p=106'); ?> 
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="col-sx-12 col-md-6 col-md-offset-3 clearfix" role="main">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block half-image" />
				</div>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					<?php the_content(); ?>
				<?php endwhile; ?>
				</div>
		    </div>
			<?php $my_query = new WP_Query('custom_cat=cursos_mople'); ?>  
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="row blog-posts-list">
					<div class="col-md-6 col-md-offset-1 ">
						<div class="row">
							<h3><?php the_title(); ?></h3>
							<div class="col-md-12">
								<?php the_field('publico_alvo'); ?>
							</div>
							<div class="col-md-12">
								<?php the_field('instrutor'); ?> | <?php the_field('duracao'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-12">
								Saiba mais:
								<a class="icon date" href="<?php the_field('data'); ?>"></a>
								<a class="icon video" href="<?php the_field('video'); ?>"></a>
								<a class="icon registration" href="<?php the_field('inscricao'); ?>"></a>
								<a class="icon pdf" href="<?php the_field('pdf'); ?>"></a>
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
					</div>
					<div class="col-md-5 ">
						
						<img src="<?php the_field('foto_do_curso'); ?>" class="img-responsive center-block" alt="<?php the_title(); ?>" />
					</div>
					
				</div>
			<?php endwhile; ?>


		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

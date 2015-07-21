<?php get_header(); ?>


    <div class="container">

			<div id="content" class="clearfix">
        <div class="row">
			<div class="col-md-12 clearfix" role="main">
			<img src="http://mople:8888/wp-content/uploads/2015/07/teste-banner.jpg" class="img-responsive center-block">
            </div>
        </div>
        <div class="row ">
			<div class="col-sm-6 col-md-4 clearfix" role="main">
				<div class="boxHome box1">
	              <?php $my_query = new WP_Query('page_id=30'); ?> 
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" name="<?php the_title(); ?>">
						<span class="icon"></span>
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
					</a>
				  <?php endwhile; ?>
				</div>
            </div>
            <div class="col-sm-6 col-md-4 clearfix boxborder" role="main">
				<div class="boxHome box2">
	              <?php $my_query = new WP_Query('page_id=23'); ?> 
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" name="<?php the_title(); ?>">
						<span class="icon"></span>
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
					</a>
				  <?php endwhile; ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-4 clearfix" role="main">
				<div class="boxHome box3">
	              <?php $my_query = new WP_Query('page_id=4'); ?> 
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" name="<?php the_title(); ?>">
						<span class="icon"></span>
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
					</a>
				  <?php endwhile; ?>
				</div>
            </div>
        </div>
        <hr class="homeBoxes"/>
        <div class="row">
			<div class="col-sm-6 col-md-4 clearfix" role="main">
				<div class="boxHome box4">
	              <?php $my_query = new WP_Query('page_id=26'); ?> 
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" name="<?php the_title(); ?>">
						<span class="icon"></span>
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
					</a>
				  <?php endwhile; ?>
				</div>
            </div>
            <div class="col-sm-6 col-md-4 clearfix" role="main">
				<div class="boxHome box5">
	              <?php $my_query = new WP_Query('page_id=28'); ?> 
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" name="<?php the_title(); ?>">
						<span class="icon"></span>
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
					</a>
				  <?php endwhile; ?>
				</div>
            </div>
            <div class="col-sm-12 col-md-4 clearfix" role="main">
				<div class="boxHome box6">
	              <?php $my_query = new WP_Query('page_id=8'); ?> 
					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>" name="<?php the_title(); ?>">
						<span class="icon"></span>
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
					</a>
				  <?php endwhile; ?>
				</div>
            </div>
        </div>

						</div> <?php // end #main ?>

			</div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>

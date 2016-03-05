<?php
/*
Template Name: Mople Cursos Petroleo e Gas
*/
?>

<?php get_header(); ?>

    <div class="container">
		<div id="content" class="clearfix">
			<div class="row">
				<div class="col-md-11 col-md-offset-1 ">
					<?php $my_query = new WP_Query('page_id=143'); ?>
						<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 clearfix" role="main">
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block header-post-image" />
							</div>
						</div>						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>

			<div class="row combo-list-courses 123">
			<div class="col-md-11 col-md-offset-1 ">
				<div class="box">
					<div class="col-md-4 text">
						<?php _e('Escolha com facilidade seu curso:', 'mople'); ?>
					</div>
					<div class="col-md-8">
				    	<select id="course_list" >
					    	<option value="all_posts">Mostrar Todos </option>
							<?php $my_query = new WP_Query('tribe_events_cat=petroleo-e-gas-lista-de-cursos'); ?>
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
			    
			    var value = $("#course_list").val();
			    if(value === "all_posts"){
			        $("#course_list .value").each(function(k,v) 
					{
			            var item = $(v).attr("value");
			      		$('#' + item).show();      
			        });
			    }else{
			      $('#' + this.value).show();
			    }
			    
			});
			</script>


			<?php
				# Event Type
				$my_query = new WP_Query('tribe_events_cat=petroleo-e-gas-lista-de-cursos');
			?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<?php
				//$post_title = the_title();
				$moreInfo_Publico_Alvo = get_field("event_basicInfo_publico_alvo");
				$moreInfo_Instrutor = get_field("event_basicInfo_instrutor");
				$moreInfo_Duracao = get_field("event_basicInfo_duracao");
				$moreInfo_inscription = get_field("event_moreInfo_inscricao");
				$moreInfo_download = get_field("event_moreInfo_pdf");
				$moreInfo_video = get_field("event_moreInfo_YT");
				$date_format = __('D d \d\e F \d\e Y');
				$list_days = get_field("dias_do_curso");
			
				# WP vars
				 $postid = get_the_ID();
			
				if (get_field('list_soon')) {
					$list_soonClass = 'hide';
				}
				else {
					$list_soonClass = '';
				}
			?>
				<div class="row course_item <?php echo $list_soonClass ?> <?php echo($_GET ["hiddenOtherCourses"]) ?>" id="course_<?php the_ID(); ?>">
					<div class="col-md-6 col-md-offset-1">
						<div class="row">
							<div class="col-md-12">
								<h3><?php the_title(); ?> </h3>
							</div>
							
							
							<?php if ($moreInfo_Publico_Alvo) {
								echo '<div class="col-md-12">
											<strong>'.__('Público Alvo:','mople').' </strong><span>'.$moreInfo_Publico_Alvo.'</span>
										</div>';
							} ?>
							<?php if ($moreInfo_Instrutor) {
								echo '<div class="col-md-12">
										<strong>'.__('Instrutor:','mople').' </strong><span>'.$moreInfo_Instrutor.'</span> | '.(($moreInfo_Duracao)?'<strong>'.__('Duração:','mople').' </strong><span>'.$moreInfo_Duracao.' '.__(' horas ','mople').'</span>':"").'
									</div>';
							} ?>
							
							<?php if ($list_days) {
								echo '<div class="col-md-12">
										<span>'.$list_days.'</span>
									  </div>';
							} ?>
						</div>
						<div class="row">
							<div class="col-md-12 course-description">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="row course-infos">

							<div class="col-md-12">
								<span class="top"><strong><?php _e('Saiba Mais', 'mople'); ?></strong></span>
								<a class="icon date" title="<?php echo tribe_get_start_date(); ?>" href="<?php the_field('data'); ?>"></a>
								
								<?php #echo 'getfield:'.get_field("event_moreInfo_YT").' | var='.$moreInfo_video; ?>
								<?php if ($moreInfo_video) {
									echo '<a class="icon video" href="'.$moreInfo_video.'?modestbranding=1&rel=0&showinfo=0&iv_load_policy=3" rel="wp-video-lightbox" title=""></a>';
								} ?>	
								
								<a class="icon registration" title="<?php _e('Registre-se', 'mople'); ?>" href="<?php echo esc_url(home_url('/')); ?>?p=311&postNome=<?php the_title();?>" target="_blank"></a>
								<?php if ($moreInfo_download) {
									echo '<a class="icon pdf" title="'.__('Download','mople').'" href="'.$moreInfo_download.'" target="_blank"></a>';
								} ?>
								
							</div>
						</div>
					</div>
					<div class="col-md-5 ">
						<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive pull-right" alt="<?php the_title(); ?>" />
					</div>
						<div class="col-md-11 col-md-offset-1">
							<hr />
						</div>

				</div>
			<?php endwhile; ?>
		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

<!--
			<div class="row">
				<?php $my_query = new WP_Query('page_id=143&showposts=100'); ?>
				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" class="img-responsive center-block half-image" />
				</div>
				<div class="col-sx-12 col-md-10 col-md-offset-1 clearfix" role="main">
					<?php the_content(); ?>
				<?php endwhile; ?>
				</div>
		    </div>

-->
<!-- 			<?php echo do_shortcode('[mople-list-cursos cat="petroleo-e-gas&showposts="100"" ]'); ?> -->

<?php
/*
Template Name: Mople e Voce Cadastro 2
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
		    <div role="form" class="wpcf7" id="wpcf7-f269-o1" lang="pt-BR" dir="ltr">
<div class="screen-reader-response"></div>
<form action="/mople-e-voce/#wpcf7-f269-o1" method="post" class="wpcf7-form" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="269">
<input type="hidden" name="_wpcf7_version" value="4.2.2">
<input type="hidden" name="_wpcf7_locale" value="pt_BR">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f269-o1">
<input type="hidden" name="_wpnonce" value="9c76544ab1">
</div>
<div class="row">
<div class="col-md-6">
<p>Seu nome (obrigatório)<br>
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span> </p>
</div>
<div class="col-md-6">
<p>Cargo<br>
    <span class="wpcf7-form-control-wrap cargo"><input type="text" name="cargo" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </p>
</div>
</div>
<div class="row">
<div class="col-md-6">
<p>Seu e-mail (obrigatório)<br>
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span> </p>
</div>
<div class="col-md-6">
<p>Telefone<br>
    <span class="wpcf7-form-control-wrap telefone"><input type="text" name="telefone" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </p>
</div>
</div>
<div class="row">
<div class="col-md-6">
<p>Empresa<br>
    <span class="wpcf7-form-control-wrap empresa"><input type="text" name="empresa" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </p>
</div>
</div>
<div class="row">
<div class="col-md-4">
<p>Você que fazer um curso na Mople?<br>
   <span class="wpcf7-form-control-wrap QuerFazerumCursoMople"><span class="wpcf7-form-control wpcf7-radio"><span class="wpcf7-list-item first"><input type="radio" name="QuerFazerumCursoMople" value="Sim">&nbsp;<span class="wpcf7-list-item-label">Sim</span></span><span class="wpcf7-list-item last"><input type="radio" name="QuerFazerumCursoMople" value="Não">&nbsp;<span class="wpcf7-list-item-label">Não</span></span></span></span> </p>
</div>
<div class="col-md-5">
<p>Como você conheceu a Mople?<br>
    <span class="wpcf7-form-control-wrap como-conheceu-a-mople"><input type="text" name="como-conheceu-a-mople" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false"></span> </p>
</div>
<div class="col-md-3">
<p>    <span class="wpcf7-form-control-wrap QuerReceberNewsletter"><span class="wpcf7-form-control wpcf7-checkbox"><span class="wpcf7-list-item first last"><input type="checkbox" name="QuerReceberNewsletter[]" value="Você quer receber a newsletter da Mople?">&nbsp;<span class="wpcf7-list-item-label">Você quer receber a newsletter da Mople?</span></span></span></span>
</p></div>
</div>
<p><input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://mople2.hospedagemdesites.ws/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando ..." style="visibility: hidden;"></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
-->
		    
		    
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
		</div> <?php // end #content ?>
    </div> <!-- end ./container -->

<?php get_footer(); ?>

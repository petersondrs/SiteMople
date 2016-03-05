<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><html <?php language_attributes(); ?> class="no-js"><![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=2">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->

		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php if(is_page_template('page-mople-cursos.php')) :?>
			<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/cursos.css?v=2" media="screen" />
		<?php endif;?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery-1.11.3.min.js" ></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/jquery.cookie.js" ></script>
		
		<script>
			$(document).ready(function(){
				var date = new Date(),
					minutes = 30,
					stylesheetName = "MopleStylesheet",
					userStylesheet = $.cookie(stylesheetName);
					
				date.setTime(date.getTime() + (minutes * 60 * 1000));

			  if(!userStylesheet){
				userStylesheet = Math.floor((Math.random()*3)+1);
				$.cookie('MopleStylesheet', userStylesheet,{expires:date});
			  }

			  var ss = $('<link/>').attr('rel', 'stylesheet').attr('type','text/css').attr('href', '<?php bloginfo('template_directory'); ?>/library/css/mople-theme-' + userStylesheet + '.css');
			  $(document.body).append(ss);

			});
		</script>
		<style>
			#course_<?php echo $_GET ["courseID"]; ?>{
				display: block;
			}
		</style>
	</head>

	<body <?php body_class(); ?>>
    <header class="header">

      <nav role="navigation">
        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><span><?php bloginfo('name'); ?></span><img src="<?php echo get_template_directory_uri(); ?>/library/images/mople-treinamentos-cursos.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a>

            </div>
			<div class="flags"><?php do_action('icl_language_selector'); ?></div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
              <?php bones_main_nav(); ?>
            </div>
          </div>
        </div>
      </nav>
	</header> <?php // end header ?>
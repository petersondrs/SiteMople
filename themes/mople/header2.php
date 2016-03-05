<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

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
		
		
<!--
		<script>
			$(document).ready(function(){
			  var userStylesheet = $.cookie('MopleStylesheet');

			  if(!userStylesheet){
				userStylesheet = Math.floor((Math.random()*3)+1);
				$.cookie('MopleStylesheet', userStylesheet);
			  }

			  var ss = $('<link/>').attr('rel', 'stylesheet').attr('type','text/css').attr('href', '<?php bloginfo('template_directory'); ?>/library/css/mople-theme-' + userStylesheet + '.css');
			  $(document.body).append(ss);

			});
		</script>
-->
		
		<script type="text/javascript">
			function getCookie(cname) { //método retirado do site da W3C
			    var name = cname + "=";
			    var ca = document.cookie.split(';');
			    for(var i=0; i<ca.length; i++) {
			        var c = ca[i];
			        while (c.charAt(0)==' ') c = c.substring(1);
			        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
			    }
			    return null;
			}

			function createStylesheet(_file){
			    var _href = 'http://www.mople.com.br/wp-content/themes/mople/library/css/' + _file + '.css';
			    var _link = document.createElement('link');
			    _link.setAttribute('rel', 'stylesheet');
			    _link.setAttribute('type', 'text/css');
			    _link.setAttribute('href', _href);
			    var _head = document.getElementsByTagName('head')[0];
			    _head.appendChild(_link);
			
			    document.cookie = "last=" + _file; //cria um cookie dizendo qual foi o ultimo css
			}
			
			function createExpireCookie(){
			    var _date = new Date();
			    _date.setTime(_date.getTime()+(30000));
			
			    var _expires = ";expires=" + _date.toUTCString();
			    document.cookie = "css=true"+ _expires; //cria cookie com validade de 30 minutos 
			}
			
			if(null == getCookie('last')){ //nao existe cookie do ultimo arquivo
			    createStylesheet('mople-theme-1');
			    createExpireCookie();
			} 
			else if (null == getCookie('css')){ //existe cookie referente ao ultimo css, mas já se passaram 30 minutos
			    var _sheets = ['mople-theme-1', 'mople-theme-2', 'mople-theme-3']; //possíveis arquivos
			    var _index = _sheets.indexOf(getCookie('last'));
			
			    _sheets.splice(_index, 1);  //remove o ultimo do array de possibilidades
			
			    createStylesheet(_sheets[Math.floor(Math.random()*_sheets.length)]); //cria um css randomizando as possibilidades do array
			    createExpireCookie();
			
			};
			
		</script>
-->
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
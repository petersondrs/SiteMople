<?php
/***
 Plugin Name: Mople Calendar Shortcode
 Plugin URI: http://profolio.com.br/?ref=mople-calendar-shortcode
 Text Domain: mople-calendar-shortcode
 Domain Path: /languages
 Description: An addon to add shortcode functionality for <a href="http://wordpress.org/plugins/the-events-calendar/">The Events Calendar Plugin (Free Version) by Modern Tribe</a>. Based in Shortcode addon by <a href="https://dandelionwebdesign.com/downloads/shortcode-modern-tribe/">Dandelion Design</a>
 Version: 1.0.3
 Author: Adriano Cahete
 Author URI: http://profolio.com.br
 Contributors: Brainchild Media Group, Reddit user miahelf, tallavic, hejeva2
 Contributor URL: http://brainchildmediagroup.com, http://www.reddit.com/user/miahelf
 License: GPL2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Avoid direct calls to this file
if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/**
 * Events calendar shortcode addon main class
 *
 * @package mople-calendar-shortcode
 * @author Adriano Cahete
 * @version 1.0.2
 */
class Events_Calendar_Shortcode
{
	/**
	 * Current version of the plugin.
	 *
	 * @since 1.0.0
	 */
	const VERSION = '1.0.1';

	/**
	 * Constructor. Hooks all interactions to initialize the class.
	 *
	 * @since 1.0.0 original
	 * @access public
	 *
	 * @see	 add_shortcode()
	 */
	public function __construct()
	{
		add_shortcode('mople-list-cursos', array($this, 'ecs_fetch_events') ); // link new function to shortcode name
	} // END __construct()
	
	/**
	 * Internacionalização
	 */
	public function mople_calendar_shortcode_translation_files() {
    load_plugin_textdomain('mople-calendar-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }
  //add_action('plugins_loaded', 'mople_calendar_shortcode_translation_files');

	/**
	 * Fetch and return required events.
	 * @param  array $atts 	shortcode attributes
	 * @return string 	shortcode output
	 */
	public function ecs_fetch_events( $atts )
	{
		/**
		 * Check if events calendar plugin method exists
		 */
		if ( !function_exists( 'tribe_get_events' ) ) {
			return;
		}

		global $wp_query, $post;
		$output = '';

		$atts = shortcode_atts( array(
			'cat' => '',
			'month' => '',
			'limit' => 5,
			'eventdetails' => 'true',
			'time' => null,
			'past' => null,
			'venue' => 'false',
			'author' => null,
			'message' => 'Não há nenhum curso para ser apresentado.',
			'key' => 'End Date',
			'order' => 'ASC',
			'viewall' => 'false',
			'excerpt' => '1500',
			'thumb' => 'true',
			'thumbwidth' => '366',
			'thumbheight' => '264',
			'contentorder' => 'title, thumbnail, excerpt, date, venue',
			'event_tax' => '',
			/*'more_info' => 'true',*/
		), $atts, 'mople-list-cursos' );

		// Category
		if ( $atts['cat'] ) {
			if ( strpos( $atts['cat'], "," ) !== false ) {
				$atts['cats'] = explode( ",", $atts['cat'] );
				$atts['cats'] = array_map( 'trim', $atts['cats'] );
			} else {
				$atts['cats'] = $atts['cat'];
			}

			$atts['event_tax'] = array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'name',
					'terms' => $atts['cats'],
				),
				array(
					'taxonomy' => 'tribe_events_cat',
					'field' => 'slug',
					'terms' => $atts['cats'],
				)
			);
		}

		// Past Event
		$meta_date_compare = '>=';
		$meta_date_date = date( 'Y-m-d' );

		if ( $atts['time'] == 'past' || !empty( $atts['past'] ) ) {
			$meta_date_compare = '<';
		}

		// Key
		if ( str_replace( ' ', '', trim( strtolower( $atts['key'] ) ) ) == 'startdate' ) {
			$atts['key'] = '_EventStartDate';
		} else {
			$atts['key'] = '_EventEndDate';
		}
		// Date
		$atts['meta_date'] = array(
			array(
				'key' => $atts['key'],
				'value' => $meta_date_date,
				'compare' => $meta_date_compare,
				'type' => 'DATETIME'
			)
		);

		// Specific Month
		if ( $atts['month'] == 'current' ) {
			$atts['month'] = date( 'Y-m' );
		}
		if ($atts['month']) {
			$month_array = explode("-", $atts['month']);

			$month_yearstr = $month_array[0];
			$month_monthstr = $month_array[1];

			$month_startdate = date($month_yearstr . "-" . $month_monthstr . "-1");
			$month_enddate = date($month_yearstr . "-" . $month_monthstr . "-t");

			$atts['meta_date'] = array(
				array(
					'key' => $atts['key'],
					'value' => array($month_startdate, $month_enddate),
					'compare' => 'BETWEEN',
					'type' => 'DATETIME'
				)
			);
		}

		$posts = get_posts( array(
			'post_type' => 'tribe_events',
			'posts_per_page' => $atts['limit'],
			'tax_query'=> $atts['event_tax'],
			'meta_key' => $atts['key'],
			'orderby' => 'meta_value',
			'author' => $atts['author'],
			'order' => $atts['order'],
			'meta_query' => array( $atts['meta_date'] )
		) );

		if ($posts) {
			$output .= '<ul class="ecs-event-list">';
			$atts['contentorder'] = explode( ',', $atts['contentorder'] );

			foreach( $posts as $post ) :
				setup_postdata( $post );

				$output .= '<li class="ecs-event">';

				// Put Values into $output
				foreach ( $atts['contentorder'] as $contentorder ) {
					switch ( trim( $contentorder ) ) {
						case 'title' :
              $moreInfo_Publico_Alvo = get_field("event_basicInfo_publico_alvo");
              $moreInfo_Instrutor = get_field("event_basicInfo_instrutor");
              $moreInfo_Duracao = get_field("event_basicInfo_duracao");
              
							$output .= '<h4 class="entry-title summary">' .
                            '<a href="' . tribe_get_event_link() . '" rel="bookmark">' . apply_filters( 'ecs_event_list_title', get_the_title(), $atts ) . '</a>
                          </h4>';
                          
              if ($moreInfo_Publico_Alvo) {
                  $output .= '<div class="basicInfo publico_alvo"><p>Publico Alvo:</p><span> '.$moreInfo_Publico_Alvo.'</span></div>';
              }
              if ($moreInfo_Instrutor) {
                  $output .= '<div class="basicInfo instrutor"><p>Instrutor: </p><span> '.$moreInfo_Instrutor.'</span></div>';
              }
              if ($moreInfo_Instrutor || $moreInfo_Duracao) {
                  $output .= '<span class="basicInfo divider"> | </span>';
              }
              if ($moreInfo_Duracao) {
                  $output .= '<div class="basicInfo duracao"><p>Duracao:</p><span> '.$moreInfo_Duracao.' horas</span></div>';
              }

							break;

						case 'thumbnail' :
							if( self::isValid($atts['thumb']) ) {
								$thumbWidth = is_numeric($atts['thumbwidth']) ? $atts['thumbwidth'] : '';
								$thumbHeight = is_numeric($atts['thumbheight']) ? $atts['thumbheight'] : '';
								if( !empty($thumbWidth) && !empty($thumbHeight) ) {
									$output .= get_the_post_thumbnail(get_the_ID(), array($thumbWidth, $thumbHeight) );
								} else {

									$size = ( !empty($thumbWidth) && !empty($thumbHeight) ) ? array( $thumbWidth, $thumbHeight ) : 'medium';

									if ( $thumb = get_the_post_thumbnail( get_the_ID(), $size ) ) {
										$output .= '<a href="' . tribe_get_event_link() . '">';
										$output .= $thumb;
										$output .= '</a>';
									}
								}
							}
							break;

						case 'excerpt' :
							if( self::isValid($atts['excerpt']) ) {
								$excerptLength = is_numeric($atts['excerpt']) ? $atts['excerpt'] : 1500;
								//$moreInfo_date = get_field("event_moreInfo_date");
								//$moreInfo_video = get_field("event_moreInfo_video");
								$moreInfo_inscription = get_field("event_moreInfo_inscricao");
								$moreInfo_download = get_field("event_moreInfo_baixar");
								
								$output .= '<p class="ecs-excerpt">' .
												self::get_excerpt($excerptLength) .
											'</p>';
                
                if ($moreInfo_inscription || $moreInfo_download) {
                    $output .= '<div class="moreInfo">
                                <p>Saiba mais: </p>';
                }

                if( self::isValid($atts['eventdetails']) ) {
                    //$output .= '<a class="icon date" href=""><img title="'.tribe_events_event_schedule_details().'" src="'.get_template_directory_uri().'/library/images/event_moreInfo/moreInfo_date.png"/></a>';
                }
                /*if ($moreInfo_video) {
                    $output .= '<a class="icon video" href="'.$moreInfo_video.'"><img src="'.get_template_directory_uri().'/library/images/event_moreInfo/moreInfo_video.png"/></a>';
                }*/
                if ($moreInfo_inscription) {
                    $output .= '<a class="icon inscription" title="Inscricao" href="'.$moreInfo_inscription.'"><img src="'.get_template_directory_uri().'/library/images/event_moreInfo/moreInfo_inscription.png"/></a>';
                }
                if ($moreInfo_download) {
                    $output .= '<a class="icon baixar" title="Baixar" href="'.$moreInfo_download.'" target="_blank"><img src="'.get_template_directory_uri().'/library/images/event_moreInfo/moreInfo_download.png"/></a>';
                } 
                
                if ($moreInfo_inscription || $moreInfo_download) {
                    $output .= '</div>';
                }
							}
							break;
							
            /*case 'more_info' :
							if( self::isValid($atts['more_info']) ) {
								$output .= '<div class="moreInfo">' .the_field(event_moreInfo_inscricao). '</div>';
							}
							break;*/

						case 'venue' :
							if( self::isValid($atts['venue']) ) {
								$output .= '<span class="duration venue"><em> at </em>' . apply_filters( 'ecs_event_list_venue', tribe_get_venue(), $atts ) . '</span>';
							}
							break;
					}
				}
				$output .= '</li>';
			endforeach;
			$output .= '</ul>';

			if( self::isValid($atts['viewall']) ) {
				$output .= '<span class="ecs-all-events"><a href="' . apply_filters( 'ecs_event_list_viewall_link', tribe_get_events_link(), $atts ) .'" rel="bookmark">' . translate( 'View All Events', 'tribe-events-calendar' ) . '</a></span>';
			}

		} else { //No Events were Found
			$output .= translate( $atts['message'], 'tribe-events-calendar' );
		} // endif

		wp_reset_query();

		return $output;
	}

	/**
	 * Checks if the plugin attribute is valid
	 *
	 * @since 1.0.5
	 *
	 * @param string $prop
	 * @return boolean
	 */
	private function isValid( $prop )
	{
		return ($prop !== 'false');
	}

	/**
	 * Fetch and trims the excerpt to specified length
	 *
	 * @param integer $limit Characters to show
	 * @param string $source  content or excerpt
	 *
	 * @return string
	 */
	private function get_excerpt( $limit, $source = null )
	{
		$excerpt = get_the_excerpt();
		if( $source == "content" ) {
			$excerpt = get_the_content();
		}

		$excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
		$excerpt = strip_tags( strip_shortcodes($excerpt) );
		$excerpt = substr($excerpt, 0, $limit);
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$excerpt .= '...';

		return $excerpt;
	}
}

/**
 * Instantiate the main class
 *
 * @since 1.0.0
 * @access public
 *
 * @var	object	$events_calendar_shortcode holds the instantiated class {@uses Events_Calendar_Shortcode}
 */
global $events_calendar_shortcode;
$events_calendar_shortcode = new Events_Calendar_Shortcode();

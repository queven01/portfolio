<?php
/**
 * The template for displaying the Featured Content
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

if ( ! defined( 'CATCHADAPTIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if ( !function_exists( 'catchadaptive_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook catchadaptive_before_content.
*
* @since Catch Adaptive 0.1
*/
function catchadaptive_featured_content_display() {
	//catchadaptive_flush_transients();

	global $post, $wp_query;

	// get data value from options
	$options 		= catchadaptive_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];
	$sliderselect	= $options['featured_content_slider'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent ) ) {
		if ( ( !$catchadaptive_featured_content = get_transient( 'catchadaptive_featured_content_display' ) ) ) {
			$layouts 	 = $options ['featured_content_layout'];
			$headline 	 = $options ['featured_content_headline'];
			$subheadline = $options ['featured_content_subheadline'];

			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if ( 'demo-featured-content' == $contentselect ) {
				$classes 		.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'catch-adaptive' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'catch-adaptive' );
			}
			elseif ( 'featured-page-content' == $contentselect ) {
				$classes .= ' featured-page-content' ;
			}

			if ( '1' == $options ['featured_content_position'] ) {
				$classes .= ' border-top' ;
			}

			$catchadaptive_featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$catchadaptive_featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$catchadaptive_featured_content .='<h1 id="featured-heading" class="entry-title">'.  $headline .'</h1>';
								}
								if ( !empty( $subheadline ) ) {
									$catchadaptive_featured_content .='<p>'. $subheadline .'</p>';
								}
							$catchadaptive_featured_content .='</div><!-- .featured-heading-wrap -->';
						}
						$catchadaptive_featured_content .='
						<div class="featured-content-wrap">';

							if ( $sliderselect ) {
								$catchadaptive_featured_content .='
								<!-- prev/next links -->
								<div id="content-controls">
									<div id="content-prev"></div>
									<div id="content-next"></div>
								</div>
								<div class="cycle-slideshow"
								    data-cycle-log="false"
								    data-cycle-pause-on-hover="true"
								    data-cycle-swipe="true"
								    data-cycle-auto-height=container
									data-cycle-slides=".featured_content_slider_wrap"
									data-cycle-fx="scrollHorz"
									data-cycle-prev="#content-prev"
        							data-cycle-next="#content-next"
									>';
							 }

							// Select content
							if ( 'demo-featured-content' == $contentselect  && function_exists( 'catchadaptive_demo_content' ) ) {
								$catchadaptive_featured_content .= catchadaptive_demo_content( $options );
							}
							elseif ( 'featured-page-content' == $contentselect && function_exists( 'catchadaptive_page_content' ) ) {
								$catchadaptive_featured_content .= catchadaptive_page_content( $options );
							}

							if ( $sliderselect ) {
								$catchadaptive_featured_content .='
								</div><!-- .cycle-slideshow -->';
							}

			$catchadaptive_featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
		set_transient( 'catchadaptive_featured_content', $catchadaptive_featured_content, 86940 );
		}
	echo $catchadaptive_featured_content;
	}
}
endif;


if ( ! function_exists( 'catchadaptive_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action catchadaptive_content, catchadaptive_after_secondary
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= catchadaptive_get_theme_options();

	if ( '1' != $options['featured_content_position'] ) {
		add_action( 'catchadaptive_before_content', 'catchadaptive_featured_content_display', 60 );
	} else {
		add_action( 'catchadaptive_after_content', 'catchadaptive_featured_content_display', 40 );
	}

}
endif; // catchadaptive_featured_content_display_position
add_action( 'catchadaptive_before', 'catchadaptive_featured_content_display_position' );


if ( ! function_exists( 'catchadaptive_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Catch Adaptive 0.1
 *
 */
function catchadaptive_demo_content( $options ) {
	$catchadaptive_demo_content = '
	<div class="featured_content_slider_wrap">
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' .  __( 'Central Park', 'catch-adaptive' ) . '" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured1-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						' .  __( 'Central Park', 'catch-adaptive' ) . '
					</h1>
				</header>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' .  __( 'Antique Clock', 'catch-adaptive' ) . '" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured2-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						' .  __( 'Antique Clock', 'catch-adaptive' ) . '
					</h1>
				</header>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' .  __( 'Vespa Scooter', 'catch-adaptive' ) . '" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured3-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						' . __( 'Vespa Scooter', 'catch-adaptive' ) . '
					</h1>
				</header>
			</div><!-- .entry-container -->
		</article>';

	if ( 'layout-four' == $options ['featured_content_layout']) {
		$catchadaptive_demo_content .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' .  __( 'Dhulikhel', 'catch-adaptive' ) . '" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured4-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						' .  __( 'Dhulikhel', 'catch-adaptive' ) . '
					</h1>
				</header>
			</div><!-- .entry-container -->
		</article>';
	}
	$catchadaptive_demo_content .= '</div><!-- .featured_content_slider_wrap -->';

	return $catchadaptive_demo_content;
}
endif; // catchadaptive_demo_content


if ( ! function_exists( 'catchadaptive_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: catchadaptive_theme_options from customizer
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_page_content( $options ) {
	global $post;

	$quantity 		= $options['featured_content_number'];
	$show_content	= $options['featured_content_show'];

	$catchadaptive_page_content 	= '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	if ( 'layout-four' == $options ['featured_content_layout']) {
		$layouts = 4;
	}
	else{
		$layouts = 3;
	}

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0;

		$catchadaptive_page_content = '
		<div class="featured_content_slider_wrap">';

		while ( $get_featured_posts->have_posts()) :
			$get_featured_posts->the_post();

			$i++;

			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			$catchadaptive_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';
				if ( has_post_thumbnail() ) {
					$catchadaptive_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) ) . '">
						'. get_the_post_thumbnail( $post->ID, 'catchadaptive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					//Default value if there is no first image
					$catchadaptive_image = '<img class="pngfix wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1680x720.jpg" >';

					//Get the first image in page, returns false if there is no image
					$catchadaptive_first_image = catchadaptive_get_first_image( $post->ID, 'catchadaptive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $catchadaptive_first_image ) {
						$catchadaptive_image =	$catchadaptive_first_image;
					}

					$catchadaptive_page_content .= '<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">
						'. $catchadaptive_image .'
					</a>';
				}

				if ( '1' == $options['featured_content_enable_title'] || 'hide-content' != $show_content ) {
				$catchadaptive_page_content .= '
					<div class="entry-container">';
					if ( '1' == $options['featured_content_enable_title'] ) {
							$catchadaptive_page_content .= the_title( '<header class="entry-header"><h1 class="entry-title">','</h1></header>', false );
					}

					if ( 'excerpt' == $show_content ) {
						$catchadaptive_page_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
					}
					elseif ( 'full-content' == $show_content ) {
						$content = apply_filters( 'the_content', get_the_content() );
						$content = str_replace( ']]>', ']]&gt;', $content );
						$catchadaptive_page_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
					}

					$catchadaptive_page_content .= '
					</div><!-- .entry-container -->';
				}
				$catchadaptive_page_content .= '
				</article><!-- .featured-page-'. $i .' -->';

				if ( 0 == ( $i % $layouts ) && $i < $number_of_page ) {
					//end and start featured_content_slider_wrap div based on logic
					$catchadaptive_page_content .= '
				</div><!-- .featured_content_slider_wrap -->

				<div class="featured_content_slider_wrap">';
				}
		endwhile;

		wp_reset_query();

		$catchadaptive_page_content .= '</div><!-- .featured_content_slider_wrap -->';
	}

	return $catchadaptive_page_content;
}
endif; // catchadaptive_page_content
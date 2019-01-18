<?php
/**
 * The template for displaying the Slider
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


if ( !function_exists( 'catchadaptive_featured_slider' ) ) :
/**
 * Add slider.
 *
 * @uses action hook catchadaptive_before_content.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_slider() {
	global $post, $wp_query;
	//catchadaptive_flush_transients();
	// get data value from options
	$options 		= catchadaptive_get_theme_options();
	$enableslider 	= $options['featured_slider_option'];
	$sliderselect 	= $options['featured_slider_type'];
	$imageloader	= $options['featured_slider_image_loader'];

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	if ( 'entire-site' == $enableslider || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enableslider ) ) {
		if ( ( !$catchadaptive_featured_slider = get_transient( 'catchadaptive_featured_slider' ) ) ) {
			echo '<!-- refreshing cache -->';

			$catchadaptive_featured_slider = '
				<section id="feature-slider">
					<div class="wrapper">
						<div class="cycle-slideshow"
						    data-cycle-log="false"
						    data-cycle-pause-on-hover="true"
						    data-cycle-swipe="true"
						    data-cycle-auto-height=container
						    data-cycle-fx="'. esc_attr( $options['featured_slide_transition_effect'] ) .'"
							data-cycle-speed="'. esc_attr( $options['featured_slide_transition_length'] ) * 1000 .'"
							data-cycle-timeout="'. esc_attr( $options['featured_slide_transition_delay'] ) * 1000 .'"
							data-cycle-loader="'. esc_attr( $imageloader ) .'"
							data-cycle-slides="> article"
							>

						    <!-- prev/next links -->
						    <div class="cycle-prev"></div>
						    <div class="cycle-next"></div>

						    <!-- empty element for pager links -->
	    					<div class="cycle-pager"></div>';

							// Select Slider
							if ( 'demo-featured-slider' == $sliderselect && function_exists( 'catchadaptive_demo_slider' ) ) {
								$catchadaptive_featured_slider .=  catchadaptive_demo_slider( $options );
							}
							elseif ( 'featured-page-slider' == $sliderselect && function_exists( 'catchadaptive_page_slider' ) ) {
								$catchadaptive_featured_slider .=  catchadaptive_page_slider( $options );
							}

			$catchadaptive_featured_slider .= '
						</div><!-- .cycle-slideshow -->
					</div><!-- .wrapper -->
				</section><!-- #feature-slider -->';

			set_transient( 'catchadaptive_featured_slider', $catchadaptive_featured_slider, 86940 );
		}
		echo $catchadaptive_featured_slider;
	}
}
endif;
add_action( 'catchadaptive_before_content', 'catchadaptive_featured_slider', 10 );


if ( ! function_exists( 'catchadaptive_demo_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from customizer options
 *
 * @since Catch Adaptive 0.1
 *
 */
function catchadaptive_demo_slider( $options ) {
	$catchadaptive_demo_slider ='
								<article class="post hentry slides demo-image displayblock">
									<figure class="slider-image">
										<a title="' .  esc_attr( __( 'Slider Image 1', 'catch-adaptive' ) ) . '" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'.get_template_directory_uri().'/images/gallery/slider1-1680x720.jpg" class="wp-post-image" alt="' .  esc_attr( __( 'Slider Image 1', 'catch-adaptive' ) ) . '" title="' .  esc_attr( __( 'Slider Image 1', 'catch-adaptive' ) ) . '">
										</a>
									</figure>
									<div class="entry-container">
										<header class="entry-header">
											<h1 class="entry-title">
												<a title="' .  esc_attr( __( 'Slider Image 1', 'catch-adaptive' ) ) . '" href="#"><span>' .  __( 'Slider Image 1', 'catch-adaptive' ) . '</span></a>
											</h1>

											<div class="assistive-text">
												<span class="post-time">
													' . __( 'Posted on', 'catch-adaptive' ) .'

													<time pubdate="" datetime="2014-08-16T10:56:23+00:00" class="entry-date updated">
														' . date_i18n( get_option( 'date_format' ), strtotime( '8/16-2014' ) ) /* https://codex.wordpress.org/Function_Reference/date_i18n */. '
													</time>
												</span>

												<span class="post-author">
													' . sprintf( _x( 'By', 'attribution', 'catch-adaptive' ) ) . '&nbsp;
													<span class="author vcard">
														<a rel="author" title="' .  esc_attr( __( 'View all posts by', 'catch-adaptive' ) ) . ' Catch Themes" href="#" class="url fn n">Catch Themes</a>
													</span>
												</span>
											</div>
										</header>
										<div class="entry-content">
											<p>' . __( 'Slider Image 1 Content', 'catch-adaptive' ) . '</p>
										</div>
									</div>
								</article><!-- .slides -->

								<article class="post hentry slides demo-image displaynone">
									<figure class="slider-image">
										<a title="' .  esc_attr( __( 'Slider Image 2', 'catch-adaptive' ) ) . '" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'. get_template_directory_uri() . '/images/gallery/slider2-1680x720.jpg" class="wp-post-image" alt="' .  esc_attr( __( 'Slider Image 2', 'catch-adaptive' ) ) . '" title="' .  esc_attr( __( 'Slider Image 2', 'catch-adaptive' ) ) . '">
										</a>
									</figure>
									<div class="entry-container">
										<header class="entry-header">
											<h1 class="entry-title">
												<a title="' .  esc_attr( __( 'Slider Image 1', 'catch-adaptive' ) ) . '" href="#"><span>' .  __( 'Slider Image 2', 'catch-adaptive' ) . '</span></a>
											</h1>
											<div class="assistive-text">
												<span class="post-time">
													' . __( 'Posted on', 'catch-adaptive' ) .'

													<time pubdate="" datetime="2014-08-16T10:56:23+00:00" class="entry-date updated">
														' . date_i18n( get_option( 'date_format' ), strtotime( '8/16-2014' ) ) /* https://codex.wordpress.org/Function_Reference/date_i18n */. '
													</time>
												</span>

												<span class="post-author">
													' . sprintf( _x( 'By', 'attribution', 'catch-adaptive' ) ) . '&nbsp;
													<span class="author vcard">
														<a rel="author" title="' .  esc_attr( __( 'View all posts by', 'catch-adaptive' ) ) . ' Catch Themes" href="#" class="url fn n">Catch Themes</a>
													</span>
												</span>
											</div>
										</header>
										<div class="entry-content">
											<p>' . __( 'Slider Image 2 Content', 'catch-adaptive' ) . '</p>
										</div>
									</div>
								</article><!-- .slides --> ';
	return $catchadaptive_demo_slider;
}
endif; // catchadaptive_demo_slider


if ( ! function_exists( 'catchadaptive_page_slider' ) ) :
/**
 * This function to display featured page slider
 *
 * @param $options: catchadaptive_theme_options from customizer
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_page_slider( $options ) {
	$quantity		= $options['featured_slide_number'];
	$more_link_text	=	$options['excerpt_more_text'];

    global $post;

    $catchadaptive_page_slider = '';
    $number_of_page 		= 0; 		// for number of pages
	$page_list				= array();	// list of valid page ids

	//Get number of valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_slider_page_' . $i] ) && $options['featured_slider_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_slider_page_' . $i] ) );
		}

	}

	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
			'posts_per_page'	=> $quantity,
			'post_type'			=> 'page',
			'post__in'			=> $page_list,
			'orderby' 			=> 'post__in'
		));
		$i=0;

		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'page pageid-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'page pageid-'.$post->ID.' hentry slides displaynone'; }
			$catchadaptive_page_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
				if ( has_post_thumbnail() ) {
					$catchadaptive_page_slider .= '<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">
						'. get_the_post_thumbnail( $post->ID, 'catchadaptive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'pngfix' ) ).'
					</a>';
				}
				else {
					//Default value if there is no first image
					$catchadaptive_image = '<img class="pngfix wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1680x720.jpg" >';

					//Get the first image in page, returns false if there is no image
					$catchadaptive_first_image = catchadaptive_get_first_image( $post->ID, 'catchadaptive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $catchadaptive_first_image ) {
						$catchadaptive_image =	$catchadaptive_first_image;
					}

					$catchadaptive_page_slider .= '<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">
						'. $catchadaptive_image .'
					</a>';
				}

				$catchadaptive_page_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-adaptive' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
						</h1>
						<div class="assistive-text">'.catchadaptive_page_post_meta().'</div>
					</header>';
					if ( $excerpt !='') {
						$catchadaptive_page_slider .= '<div class="entry-content">'. $excerpt.'</div>';
					}
					$catchadaptive_page_slider .= '
				</div><!-- .entry-container -->
			</article><!-- .slides -->';
		endwhile;

		wp_reset_query();
  	}
	return $catchadaptive_page_slider;
}
endif; // catchadaptive_page_slider
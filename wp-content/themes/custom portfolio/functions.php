<?php 

//add scripts and stylesheet

function newtheme_enqueue_style() {
  	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('font', get_template_directory_uri().'/css/font-awesome.min.css');
	  wp_enqueue_style('core', get_template_directory_uri().'/style.css');

}

function newtheme_enqueue_script() {
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-3.1.1.min.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'newtheme_enqueue_style');
add_action('wp_enqueue_scripts', 'newtheme_enqueue_script');

/*Register Menu*/
function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
  register_nav_menu('category-menu',__( 'Category Menu' ));
};

add_action( 'init', 'register_my_menu' );

// adds the excerpts (read more link)
function new_excerpt_more( $more ) {
  return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
/*adding post types*/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	//can register multiple post types in this function
  register_post_type( 'newest-projects',
    array(
      'labels' => array(
        'name' => __( 'Newest Projects' ),
        'singular_name' => __( 'Newest Project' )
      ),
      'public' => true,
      'has_archive' => true,
      'suports' => array('title','editor','page-attributes', 'thumbnail')
    )
  );
}

//sets a custom size for thumbnails

add_theme_support('post-thumbnails');
add_post_type_support( 'newest-projects', 'thumbnail' );
add_image_size('menu-thumb', 370, 370);
add_image_size('menu-projects', 540, 540);
add_image_size('main-img', 700 , 700);

add_filter( 'excerpt_more', 'new_excerpt_more' );


//add support for title tag 
add_theme_support('title-tag');

//register widgets
register_sidebar();

/*side bar*/
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
  'after_widget'  => '</li>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>',
    ) );
}

/*removing the bottom related posts from single posts.*/
function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );


/*adding a randomize of posts*/

function wpb_rand_posts() { 

$args = array(
  'post_type' => 'post',
  'orderby' => 'rand',
  'posts_per_page' => 5, 
  );

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {

$string .= '<ul>';
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    $string .= '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
  }
  $string .= '</ul>';
  /* Restore original Post Data */
  wp_reset_postdata();
} else {

$string .= 'no posts found';
}

return $string; 
} 

add_shortcode('wpb-random-posts','wpb_rand_posts');
add_filter('widget-text', 'do_shortcode'); 
 ?>
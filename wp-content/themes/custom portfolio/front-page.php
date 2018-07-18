<?php 
/*
The template for displaying pages

This is the template that displays all pages by default. Please note that this is the WordPress contstruct of pages and the other 'pages' on your WordPress site will use a different template.
*/
 ?>

<!-- --><?php //include 'header-home.php'; ?>
<!DOCTYPE html>
<html> <!-- left open, close in footer -->
<head <?php language_attributes(); ?>>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<!-- <link rel="stylesheet" type="text/css" href=""> dont link to css here, we'll do that in functions.php -->
    <?php wp_head(); ?> <!-- used as a hook, must include -->
</head>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'main-img' ); ?>

<header class="home-page-header" style="background-image: url(<?php echo $url ?>);">
	<div class="overlay">
		<div class="hero-content">
			<div>
				<a href="<?php echo esc_url(home_url('/')); ?>"><img class="main-logo" src="http://designnsuccess.com/wp-content/uploads/2018/01/white-logo.png" alt="logo"></a>
			</div>
			<h2 class="description"><?php bloginfo('description') ?></h2>
			<h1 class="site-title"><?php bloginfo('name'); ?></h1>
			<div class="call-to-action">
                <?php wp_nav_menu( array( 'theme_location' => 'home-page-menu' ) ); ?>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Page Header") ) : ?>
                <?php endif;?>
			</div>
		</div>
	</div>
</header>

<body> <!-- left open, close in footer -->

<section class="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    endif; ?>
	 <div class="row">
         <?php
         $args = array( 'post_type' => 'jetpack-portfolio', 'posts_per_page' => 4 );
         $loop = new WP_Query( $args );

         while ($loop->have_posts() ) : $loop->the_post(); ?>
             <?php
             $post_perma = get_post_permalink();
             $project_img = get_the_post_thumbnail_url();
             ?>
	         <div class="col-lg-3 col-md-4 col-sm-6 newest-projects-expanded" style="background: url(<?php echo $project_img; ?>);">
		         <a class="callout-link" href="<?php echo "$post_perma";  ?>">
			         <h4>
                         <?php the_title(); ?>
			         </h4>
		         </a>
	         </div>

         <?php endwhile;  ?>
	 </div>
 </section>
 
 <?php get_footer(); ?>
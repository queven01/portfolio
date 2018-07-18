<?php 
/*
The template fro displaying the header.
*/
 ?>
<!DOCTYPE html>
<html> <!-- left open, close in footer -->
<head <?php language_attributes(); ?>>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<!-- <link rel="stylesheet" type="text/css" href=""> dont link to css here, we'll do that in functions.php -->
	<?php wp_head(); ?> <!-- used as a hook, must include -->
</head>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>
<header class="all-pages-header" style="background-image: url(<?php echo $url ?>);">
	<div class="overlay">
		<nav class="main-menu">
			<a href="<?php echo esc_url(home_url('/')); ?>"><img class="main-logo" src="http://designnsuccess.com/wp-content/uploads/2018/01/white-logo.png" alt="logo"></a>
			<h2 class="blogname"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
		<div class="hero-content">
			<h2 class="description>"<?php bloginfo('description') ?></h2>
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</div>
	</div>
</header>

<body> <!-- left open, close in footer -->
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'main-img' ); ?>
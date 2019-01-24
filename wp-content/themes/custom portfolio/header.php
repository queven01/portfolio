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

<?php $page_id = get_queried_object_id(); ?>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>
<?php $blog_img = wp_get_attachment_url( get_post_thumbnail_id($page_id, 'large') ); ?>

<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
<?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>

<header class="all-pages-header" style="background-image: url(<?php if(is_home()){echo $blog_img;} else {echo $url;}?>);">
	<div class="overlay">
		<nav class="main-menu">
			<div class="nav-scroll-background"></div>
			<a href="<?php echo esc_url(home_url('/')); ?>"><img class="main-logo" src="<?php echo $image[0]; ?>" alt="logo"></a>
			<h2 class="blogname"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h2>
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			<div class="menu-icon" onclick="toggleMenu(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
		</nav>
		<div class="hero-content">
			<h2 class="description>"<?php bloginfo('description') ?></h2>
			<h1 class="page-title"><?php if(single_cat_title()){ single_cat_title();} else { single_post_title();} ?></h1>
		</div>
	</div>
</header>

<body> <!-- left open, close in footer -->
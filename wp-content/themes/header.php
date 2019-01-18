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

<body> <!-- left open, close in footer -->
 <header class="header-img secondary-page-header" style="background-image: url(<?php echo $url ?>);">
	<div class="overlay">
		<nav class="main-menu">
			<div class="container"> 
				<a href="<?php echo esc_url(home_url('/')); ?>"><img class="main-logo" src="http://designnsuccess.com/wp-content/uploads/2018/01/white-logo.png" alt="logo"></a>
				<h1 class="blogname"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</nav> 	
		<h2 class="main-header-title"><?php the_title(); ?></h2>
	</div>
</header>
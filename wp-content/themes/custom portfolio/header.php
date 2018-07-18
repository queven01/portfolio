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

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'main-img' ); ?>
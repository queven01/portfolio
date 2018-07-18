<?php 
/*
The template for displaying pages

This is the template that displays all pages by default. Please note that this is the WordPress contstruct of pages and the other 'pages' on your WordPress site will use a different template.
*/
 ?>

<?php get_header(); ?>

<section class="main clearfix">
 	<div class="container">
	    <?php the_content(); ?>
	</div>
 </section>
 
 <?php get_footer(); ?>
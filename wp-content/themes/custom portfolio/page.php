<?php 
/*
The template for displaying pages

This is the template that displays all pages by default. Please note that this is the WordPress contstruct of pages and the other 'pages' on your WordPress site will use a different template.
*/
 ?>

<?php get_header(); ?>

<section class="main">
 	<div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        endif; ?>
	</div>
 </section>
 
 <?php get_footer(); ?>
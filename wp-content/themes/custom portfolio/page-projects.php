<?php 
/*
The template for displaying pages

This is the template that displays all pages by default. Please note that this is the WordPress contstruct of pages and the other 'pages' on your WordPress site will use a different template.
*/
 ?>

 <?php get_header(); ?>

 <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>

 <section class="main clearfix">
 	<div class="container">
		<?php the_content(); ?>
	</div>
	<nav class="category-menu clearfix">
		<?php wp_nav_menu( array( 'theme_location' => 'category-menu' ) ); ?>
	</nav> 
	<div class="container">
	<?php 
		$args = array( 'post_type' => 'newest-projects', 'posts_per_page' => 13, 'orderby' => 'rand');
	  	$loop = new WP_Query( $args );

	  while ($loop->have_posts() ) : $loop->the_post(); ?> 
	  <?php $post_perma = get_post_permalink(); ?>

	  	<a class="callout-link" href="<?php echo "$post_perma";  ?>">
	  		<div class="col-md-4 newest-projects-expanded">
		  		<h4>
		  			<?php the_title(); ?>
		  		</h4>
		  		<p class="project-img">
		  			<?php the_post_thumbnail('menu-projects'); ?>
		  		</p>
			  	<p>
			  		<?php the_content(); ?>
			 	</p>
			</div>
		</a>

	<?php endwhile;  ?>
	</div>
 </section>
 
 <?php get_footer(); ?>
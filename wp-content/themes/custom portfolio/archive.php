<?php 
/*
The main template file.

This is the most generic tempalte file in a WordPress theme and one of the two required files for a theme. 
( other being style.css )

It is used to display a page when nothing more specific matches a query.

*/
 ?>

 <?php get_header(); ?>

 <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>

 <article class="blog-posts">
 	<!-- default loop - while there are post in the database return the post and the contents -->
 	<!-- this is the newest projects section -->
 	<nav class="category-menu clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'category-menu' ) ); ?>
		</nav> 
 	<div class="container">
 		<?php if(have_posts()): ?>
 			<?php while(have_posts()): the_post('category-menu'); ?>
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
 			<?php endwhile; ?>
 				<?php else: ?>
 				<div class="container 404-page">
 					
 				</div>
	 			<h3>Not Found</h3>
	 			<?php _e("Sorry, but you are looking for something that isn't here.") ?>
 		<?php endif; ?>
 	</div>
 </article>

 <?php get_footer(); ?>
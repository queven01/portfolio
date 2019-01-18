<?php
/**
 * The Template for displaying all single posts
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php 
			/** 
			 * catchadaptive_after_post hook
			 *
			 * @hooked catchadaptive_post_navigation - 10
			 */
			do_action( 'catchadaptive_after_post' ); 
			
			/** 
			 * catchadaptive_comment_section hook
			 *
			 * @hooked catchadaptive_get_comment_section - 10
			 */
			do_action( 'catchadaptive_comment_section' ); 
		?>
	<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
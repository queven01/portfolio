<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package draft-portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-entry'); ?>>
	<header class="entry-header">
		

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //draft_portfolio_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" >
		<?php the_post_thumbnail('draft-portfolio-thumb-large'); ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</a>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //draft_portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package draft-portfolio
 */

?>

	</div><!-- #content -->
	</div><!-- grid pag -->
	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="center">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'draft-portfolio' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'draft-portfolio' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'draft-portfolio' ), 'draft-portfolio', '<a href="https://thepixeltribe.com" rel="designer">Pixel Tribe</a>' ); ?>

		</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

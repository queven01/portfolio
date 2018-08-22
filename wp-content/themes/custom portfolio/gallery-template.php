<?php
/**
 * Template Name: Gallery
 * Template Post Type: post, page, jetpack-portfolio
 */
?>

<?php get_header(); ?>

<section class="single-blog">
	<div class="container">
		<div class="main">
			<div class="row">
                <?php
                if( have_rows('testing') ):
                    echo "hi";
                endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>


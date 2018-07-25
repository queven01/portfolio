<?php
/**
 * Template Name: Projects Page
 */
?>

<?php get_header(); ?>

    <section class="all-projects">
	    <nav class="category-navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'category-menu' ) ); ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Category Menu") ) : ?>
            <?php endif;?>
	    </nav>
	    <div class="row">
            <?php
	            $args = array( 'post_type' => 'jetpack-portfolio', 'posts_per_page' => 13, 'orderby' => 'rand');
	            $loop = new WP_Query( $args );

	            while ($loop->have_posts() ) : $loop->the_post(); ?>
	                <?php
			            $post_perma = get_post_permalink();
			            $project_img = get_the_post_thumbnail_url();
			            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 newest-projects-expanded" style="background: url(<?php echo $project_img; ?>);">
	                    <a class="callout-link" href="<?php echo "$post_perma";  ?>">
                        <h4>
                            <?php the_title(); ?>
                        </h4>
	                    </a>
                    </div>
	            <?php endwhile;  ?>
	    </div>
    </section>

<?php get_footer(); ?>
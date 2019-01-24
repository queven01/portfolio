<?php 
/*
The main template file.

This is the most generic tempalte file in a WordPress theme and one of the two required files for a theme. 
( other being style.css )

It is used to display a page when nothing more specific matches a query.

*/
 ?>

<?php get_header(); ?>

 <article class="blog-posts">
 	<!-- default loop - while there are post in the database return the post and the contents -->
 	<?php if(have_posts()): ?>
		    <section class="all-posts">
			    <nav class="category-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'blog-category-menu' ) ); ?>
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Category Menu") ) : ?>
                    <?php endif;?>
			    </nav>
			    <div class="row">
                    <?php
                    $args = array( 'post_type' => 'post', 'posts_per_page' => 13, 'orderby' => 'rand');
                    $loop = new WP_Query( $args );

                    while ($loop->have_posts() ) : $loop->the_post(); ?>
                        <?php
                        $post_perma = get_post_permalink();
                        $project_img = get_the_post_thumbnail_url();
                        ?>
					    <div class="col-lg-3 col-md-4 col-sm-6 newest-projects-expanded" style="background: url(<?php echo $project_img; ?>);">
						    <a class="callout-link" href="<?php echo "$post_perma";  ?>">
							    <div class="blog-post-view-single">
                                    <h2 class="blog-title"><?php the_title(); ?></h2>
								    <small><?php the_content(); ?></small>
							    </div>
						    </a>
					    </div>
                    <?php endwhile;  ?>
			    </div>
		    </section>
            <?php else: ?>
 				<div class="container" style="text-align: center;">
 					<h3 style="margin-top: 3em; font-size: 4em;">Oops! Not Found</h3>
	 				<p>Sorry, but you are looking for something that isn't here.</p>
	 				<a href="/"><button style="margin: 20px 0px 50px 0px; font-size: 2em; border: none; padding: 20px 50px; color: white; background: #f00;">Back to Home</button></a>
 				</div>
    <?php endif; ?>
 </article>



 <?php get_footer(); ?>
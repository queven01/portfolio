<?php 
/*
The main template file.

This is the most generic tempalte file in a WordPress theme and one of the two required files for a theme. 
( other being style.css )

It is used to display a page when nothing more specific matches a query.

*/
 ?>
 <?php get_header(); ?>

 <section class="category">
 	<nav class="category-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'category-menu' ) ); ?>
		</nav>
	    <div class="row">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post('category-menu');
                    $project_img = get_the_post_thumbnail_url();
                    $post_perma = get_post_permalink();?>

				    <div class="col-lg-3 col-md-4 col-sm-6 newest-projects-expanded" style="background: url(<?php echo $project_img; ?>);">
					    <a class="callout-link" href="<?php echo "$post_perma";  ?>">
						    <h4>
                                <?php the_title(); ?>
						    </h4>
					    </a>
				    </div>
                <?php endwhile; ?>
            <?php else: ?>
	    </div>
	    <div class="container error-page">
		    <h1>404 Error: Oops!</h1>
		    <h2> This page was not found!</h2>
            <p><?php _e("Sorry, but you are looking for something that isn't here.") ?></p>
		    <p><a onclick="goBack()" class="btn btn-primary btn-large">Go Back</a></p>
	    </div>
        <?php endif; ?>
 </section>

 <?php get_footer(); ?>
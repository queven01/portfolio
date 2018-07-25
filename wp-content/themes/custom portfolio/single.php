<?php 
/*
The template for diplaying all single post and attachments
*/
 ?>
<?php get_header(); ?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'main-img' ); ?>

 <section class="single-blog">
 	<div class="container">
	    <div class="main">
		    <div class="row">
	            <?php
	            if(have_posts()):
	                while(have_posts()): ?>
	                    <?php	the_post(); ?>
					    <div class="col-md-6">
	                        <?php the_content(); ?>
					    </div>
					    <div class="col-md-6">
						    <p class="img">
	                            <?php	the_post_thumbnail('main-img'); ?>
						    </p>
					    </div>
	                <?php	endwhile;
	            endif; ?>
		    </div>
	    </div>
 	 </div>

 </section>

 <?php get_footer(); ?>
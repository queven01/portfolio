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
	            <?php
	            if(have_posts()):
	                while(have_posts()): ?>
	                    <?php	the_post(); ?>
	                        <?php the_content(); ?>
	                <?php	endwhile;
	            endif; ?>
	    </div>
 	 </div>

 </section>

 <?php get_footer(); ?>
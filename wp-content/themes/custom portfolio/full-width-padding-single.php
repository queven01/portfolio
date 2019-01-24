<?php 
/*
 * Template Name: Full Width Padding
 * Template Post Type: post, page, jetpack-portfolio
 */
get_header(); ?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'main-img' ); ?>

 <section class="single-blog">
    <div class="main single-blog-padding">
            <?php
            if(have_posts()):
                while(have_posts()): ?>
                    <?php	the_post(); ?>
                        <?php the_content(); ?>
                <?php	endwhile;
            endif; ?>
    </div>
 </section>

 <?php get_footer(); ?>
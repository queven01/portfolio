<?php /* Template Name: Flexible Layout */ ?>

<?php get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <?php

            // check if the flexible content field has rows of data
            if( have_rows('flexible_layout') ):

                 // loop through the rows of data
                while ( have_rows('flexible_layout') ) : the_row();

                    include 'flexible-layout-templates/columns-template.php';

                endwhile;

            else :

                // no layouts found

            endif;

            ?>

        </main><!-- #main -->

    </div><!-- #primary -->

<?php
get_footer();
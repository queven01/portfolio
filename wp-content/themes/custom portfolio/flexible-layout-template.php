<?php /* Template Name: Flexible Layout */ ?>

<?php get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <h2><?php the_field('text'); ?></h2>

            <?php

            echo "testing echo outside";


            // check if the flexible content field has rows of data
            if( have_rows('flexible_layout') ):

                 // loop through the rows of data
                while ( have_rows('flexible_layout') ) : the_row();

                    echo "testing echo";

                    if( get_row_layout() == 'paragraph' ):

                        the_sub_field('text');

                    elseif( get_row_layout() == 'download' ): 

                        $file = get_sub_field('file');

                    endif;

                endwhile;

            else :

                // no layouts found

            endif;




            if( have_rows('flexible_layout') ):

                echo "testing echo";

                while ( have_rows('flexible_layout') ) : the_row();

                    echo "inside echo tests";
                    // include 'flexible-layout-templates/columns-template.php';
                 endwhile; wp_reset_query();
            endif; ?>

            
            <?php if( get_field('text') ): ?>
                <h2><?php the_field('text'); ?></h2>
            <?php endif; ?>
            <?php
            if( get_field('text') ):

                // loop through the rows of data
                while ( has_sub_field('text') ) :

                     echo "yes it worked";

                endwhile;

            endif;

            ?>

        </main><!-- #main -->

    </div><!-- #primary -->

<?php
get_footer();
<?php
if( get_row_layout() == 'columns_row' ):

        if( have_rows('row_options') ):
            while ( have_rows('row_options') ) : the_row();

                $custom_class = get_sub_field('class');
                $add_container = get_sub_field('container');
                $add_overlay = get_sub_field('overlay');
                $parallax_effect = get_sub_field('parallax_effect');
                $background_image = 'background-image: url(' . get_sub_field('background') . ');';
                $row_padding = 'padding:'. get_sub_field('row_padding') . ';';
                $fixed = ' background-attachment: fixed;';

                echo '<div class="row '.$custom_class.'" style="'.$background_image.' '.$row_padding.'';

                // Adding Paralax Effect
                if ($parallax_effect):
                    echo $fixed;
                endif;

                echo ' ">';

                //Adding Container
                if ($add_container):
                    echo '<div class="container">';
                endif;

            endwhile;
        endif;  

        //Adding Columns
        if( have_rows('columns') ):
            while ( have_rows('columns') ) : the_row();

                $column_content = get_sub_field('content_editor');

                if( have_rows('column_options') ):
                    while ( have_rows('column_options') ) : the_row();

                        $desktop_view = get_sub_field('column_width_desktop');
                        $tablet_view = get_sub_field('column_width_tablet');
                        $mobile_view = get_sub_field('column_width_mobile');
                        $column_padding = 'padding:'. get_sub_field('column_padding'). ';';
                        $column_class = get_sub_field('column_class');
                        
                        echo '<div class="column-background '.$desktop_view.' '.$tablet_view.' '.$mobile_view.' '.$column_class.'" style="'.$column_padding.'"> ';

                        echo $column_content;

                    endwhile;
                endif;
                echo '</div>';
            endwhile;
        endif;

        //Add Container
        if ($add_container):
            echo '</div> ';
        endif;

    echo '</div>';
endif; ?>
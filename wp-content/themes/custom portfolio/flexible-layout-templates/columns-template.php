<?php
if( get_row_layout() == 'columns_row' ):

    echo '<div class="row">';

        if( have_rows('row_options') ):
            while ( have_rows('row_options') ) : the_row();
                $custom_class = get_sub_field('class');
                $add_container = get_sub_field('container');
                $add_overlay = get_sub_field('overlay');
                $background_image = get_sub_field('background');
            endwhile;
        endif;  


        if( have_rows('columns') ):
            while ( have_rows('columns') ) : the_row();

                $column_content = get_sub_field('content');

                if( have_rows('column_options') ):
                    while ( have_rows('column_options') ) : the_row();

                        $desktop_view = get_sub_field('column_width_desktop');
                        $tablet_view = get_sub_field('column_width_tablet');
                        $mobile_view = get_sub_field('column_width_mobile');

                        $column_padding = 'padding:'. get_sub_field('column_padding') . ';';
                        
                        echo '<div class="column-background '. $desktop_view .' '. $tablet_view .' '. $mobile_view ;
                    endwhile;

                    while ( have_rows('background_options') ) : the_row();
                        $background_image = 'background-image: url(' . get_sub_field('background') . ');';
                        
                        $parallax_effect = get_sub_field('parallax_effect');
                        if ($parallax_effect):
                            $fixed = 'fixed';
                            echo  ' '. $fixed;
                        endif;

                        echo '" style="'. $background_image .' '. $column_padding;
                    
                    endwhile;


                endif;

                // if( have_rows('button_styles') ):
                //     while ( have_rows('button_styles') ) : the_row();
                //         $button_class = get_sub_field('button_class');
                //         $link = get_sub_field('button');
                //         echo '<a href="'.$link['url'].'" class="btn '.$button_class.'">'.$link['title'].'</a>';
                //         if ($button_class == 'btn-custom'):
                //             while ( have_rows('custom_button_settings') ) : the_row();
                //                 $color = get_sub_field('color');
                //                 $background_color = 'background: '. get_sub_field('background_color').';';
                //                 $top_bottom_padding = get_sub_field('top_bottom_padding');
                //                 $left_right_padding = get_sub_field('left_right_padding');
                //                 $padding = 'padding:'.$top_bottom_padding.' '.$left_right_padding.';';
                //                 $font_size = 'font-size: '.get_sub_field('font_size').';';
                //                 echo '<a class="btn" href="'.$link['url'].'" style="'.$background_color.' '.$padding.' '. $font_size .'">'.$link['title'].'</a>';
                //             endwhile;
                //         endif;
                //     endwhile;
                // endif;
                echo '</div>';
            endwhile;
        endif;
    echo '</div>';
endif; ?>
<?php 
/*
The template for displaying the footer.
*/
 ?>
 
 <footer>
 	<div class="container">
 		<div class="col-md-4">
 			<h3>Social Media</h3>
 			<?php if (function_exists("DISPLAY_ACURAX_ICONS")) { DISPLAY_ACURAX_ICONS(); } ?>
 		</div>
 		<div class="col-md-4">
 			
 		</div>
 		<div class="col-md-4">
 			<div class="footer-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1' ) ); ?>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Menu 1") ) : ?>
                <?php endif;?>
 			</div>
 		</div>
 	</div>
 	<div class="col-md-12 copyright">
 		<p>Copyright 2017 Kevin Correa</p>
 	</div>
 </footer>

 <?php wp_footer(); ?>
 
 </body>
 </html>
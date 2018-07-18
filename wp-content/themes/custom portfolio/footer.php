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
 			<ul class="footer-nav">
 				<li><a href="http://designnsuccess.com/contact/">Contact</a></li>
 				<li><a href="http://designnsuccess.com/projects/">Projects</a></li>
 				<li><a href="http://designnsuccess.com/about/">About</a></li>
 			</ul>
 		</div>
 	</div>
 	<div class="col-md-12 copyright">
 		<p>Copyright 2017 Kevin Correa</p> 	
 		<div class="icon-credit">Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
 	</div>
 </footer>

 <?php wp_footer(); ?>
 
 </body>
 </html>
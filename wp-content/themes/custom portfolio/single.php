<?php 
/*
The template for diplaying all single post and attachments
*/
 ?>
<?php get_header(); ?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'main-img' ); ?>
 <header class="header-img secondary-page-header" style="background-image: url(<?php echo $url ?>);">
	<div class="overlay">
		<nav class="main-menu">
			<div class="container"> 
				<a href="<?php echo esc_url(home_url('/')); ?>"><img class="main-logo" src="http://designnsuccess.com/wp-content/uploads/2018/01/white-logo.png" alt="logo"></a>
				<h1 class="blogname"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</nav> 	
		<h2 class="main-header-title">Projects</h2>
	</div>
</header>

<h2 class="main-header-title"><?php the_title(); ?></h2>	
 <section class="single-blog">
 	<div class="container">
	 	<!-- default loop - while there are post in the database return the post and the contents -->
	 	<?php 
	 		if(have_posts()):
	 			while(have_posts()): ?>
	 			<?php	the_post(); ?>
	 			<div class="half-post">
	 				<?php the_content(); ?>
	 			</div>
	 			<div class="half-post">
	 				<p class="img">
	 					<?php	the_post_thumbnail('main-img'); ?>
	 				</p>
	 			</div>
	 		<?php	endwhile;
	 		endif; ?>
 	 </div>

 </section>

 <?php get_footer(); ?>
<?php 
/*
The main template file.

This is the most generic tempalte file in a WordPress theme and one of the two required files for a theme. 
( other being style.css )

It is used to display a page when nothing more specific matches a query.

*/
 ?>

<?php get_header(); ?>
TESTING
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
		<h2 class="main-header-title"><?php the_title(); ?></h2>
	</div>
</header>

 <article class="blog-posts">
 	<!-- default loop - while there are post in the database return the post and the contents -->
 	<?php if(have_posts()): ?>
 			<?php while(have_posts()): the_post(); ?>

 			<!-- display the content from the post within HTML -->
 			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 			<?php the_content(); ?>	

 			<!-- Check if the post has a post thumbnail assigned to it. -->
 			<?php if(has_post_thumbnail()){
 				the_post_thumbnail();
 				};  ?>
 			<?php endwhile; ?>
 				<?php else: ?>
 				<div class="container" style="text-align: center;">
 					<h3 style="margin-top: 3em; font-size: 4em;">Oops! Not Found</h3>
	 				<p>Sorry, but you are looking for something that isn't here.</p>
	 				<a href="http://www.designnsuccess.com"><button style="margin: 20px 0px 50px 0px; font-size: 2em; border: none; padding: 20px 50px; color: white; background: #f00;">Back to Home</button></a>
 				</div>
 		<?php endif; ?>
 </article>

 <?php get_footer(); ?>
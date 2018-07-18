<?php 
/*
The template for displaying pages

This is the template that displays all pages by default. Please note that this is the WordPress contstruct of pages and the other 'pages' on your WordPress site will use a different template.
*/
 ?>

<?php get_header(); ?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>
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

<section class="main clearfix">
 	<div class="container">
		<?php the_content(); ?>
	</div>

<!-- PROJECTS PAGE -->
		<?php if ($id == 131) { ?>
		Hello?
		<nav class="category-menu clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'category-menu' ) ); ?>
		</nav> 
		<div class="container">
		<?php 
			$args = array( 'post_type' => 'newest-projects', 'posts_per_page' => 13, 'orderby' => 'rand');
		  	$loop = new WP_Query( $args );

		  while ($loop->have_posts() ) : $loop->the_post(); ?> 
		  <?php $post_perma = get_post_permalink(); ?>

		  	<a class="callout-link" href="<?php echo "$post_perma";  ?>">
		  		<div class="col-md-4 newest-projects-expanded">
			  		<h4>
			  			<?php the_title(); ?>
			  		</h4>
			  		<p class="project-img">
			  			<?php the_post_thumbnail('menu-projects'); ?>
			  		</p>
				  	<p>
				  		<?php the_content(); ?>
				 	</p>
				</div>
			</a>

		<?php endwhile;  ?>
		<?php }; ?>
	</div>
 </section>
 
 <?php get_footer(); ?>
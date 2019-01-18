<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package draft-portfolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'draft-portfolio' ); ?></a>

	<header id="masthead" class="site-header grid" role="banner">
		
			<div class="site-branding col-4-12">
                
    				<hgroup>
       					<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
    				</hgroup>

            </div><!-- site-branding -->

	<div class="col-8-12 push-right cleared">
		<?php	if (  has_nav_menu( 'primary' ) ) {
		 wp_nav_menu(array(
        'menu' => 'Main Navigation',
        'container_id' => 'cssmenu',
        'theme_location' => 'primary',
        'walker' => new Draft_CSS_Menu_Walker()
    	));	}?>
    	
	</div>
        

    </header><!-- #masthead -->


	<div id="content" class="site-content">
	<div class="grid">
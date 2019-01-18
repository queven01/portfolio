<?php
/**
 * draft Theme Customizer.
 *
 * @package draft-portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function draft_portfolio_customize_register( $wp_customize ) {



//function draft_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
add_action( 'customize_register', 'draft_portfolio_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function draft_portfolio_customize_preview_js() {
	wp_enqueue_script( 'draft_portfolio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'draft_portfolio_customize_preview_js' );
/**
 * Display upgrade notice on customizer page
 */
function draft_upsell_notice() {
 // Enqueue the script
 wp_enqueue_script(
 'draft-customizer-upsell',
 get_template_directory_uri() . '/js/upsell.js',
 array(), '1.0.0',
 true
 );
 // Localize the script
 wp_localize_script(
 'draft-customizer-upsell',
 'draftL10n',
 array(
 'draftURL'	=> esc_url( 'https://thepixeltribe.com/template/draft-portfolio/' ),
 'draftLabel'	=> __( 'Upgrade to Draft PRO!', 'draft' ),
 )
 );
}
add_action( 'customize_controls_enqueue_scripts', 'draft_upsell_notice' );
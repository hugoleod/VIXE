<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Church Services
 * @subpackage church_services
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses church_services_header_style()
 */
function church_services_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'church_services_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'church_services_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'church_services_custom_header_setup' );

if ( ! function_exists( 'church_services_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see church_services_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'church_services_header_style' );
function church_services_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$church_services_custom_css = "
        .headerbox,.header-img{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'church-services-style', $church_services_custom_css );
	endif;
}
endif;

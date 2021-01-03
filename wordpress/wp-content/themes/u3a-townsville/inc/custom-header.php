<?php
/**
 * @package U3A_TOWNSVILLE
 * Setup the WordPress core custom header feature.
 *
 * @uses u3a_townsville_header_style()
*/
function u3a_townsville_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'u3a_townsville_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 197,
		'wp-head-callback'       => 'u3a_townsville_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'u3a_townsville_custom_header_setup' );

if ( ! function_exists( 'u3a_townsville_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see u3a_townsville_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'u3a_townsville_header_style' );
function u3a_townsville_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'u3a-townsville-basic-style', $custom_css );
	endif;
}
endif;
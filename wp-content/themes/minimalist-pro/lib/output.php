<?php
/**
 * Minimalist Pro.
 *
 * This file adds the required CSS to the front end to the Minimalist Pro Theme.
 *
 * @package Twenty Seven
 * @author  Brian Gardner
 * @license GPL-2.0+
 * @link    https://briangardner.com/
 */

add_action( 'wp_enqueue_scripts', 'minimalist_css' );
/**
* Checks the settings for the link color, and accent color.
* If any of these value are set the appropriate CSS is output.
*
* @since 2.2.3
*/
function minimalist_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$color_link = get_theme_mod( 'minimalist_link_color', minimalist_customizer_get_default_link_color() );
	$color_accent = get_theme_mod( 'minimalist_accent_color', minimalist_customizer_get_default_accent_color() );

	$css = '';

	//* Calculate color contrast
	function minimalist_color_contrast( $color ) {
	
		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

		return ( $luminosity > 128 ) ? '#000' : '#fff';

	}
	
	//* Calculate color brightness
	function minimalist_color_brightness( $color, $change ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );
	
		$red   = max( 0, min( 255, $red + $change ) );
		$green = max( 0, min( 255, $green + $change ) );  
		$blue  = max( 0, min( 255, $blue + $change ) );

		return '#'.dechex( $red ).dechex( $green ).dechex( $blue );

	}

	$css .= ( minimalist_customizer_get_default_link_color() !== $color_link ) ? sprintf( '

		a,
		.archive-pagination a:hover,
		.archive-pagination a:focus,
		.archive-pagination .active a,
		.entry-title a:focus,
		.entry-title a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu a:hover,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-responsive-menu .genesis-nav-menu a:focus,
		.genesis-responsive-menu .genesis-nav-menu a:hover,
		.menu-toggle:focus,
		.menu-toggle:hover,
		.site-footer a:hover,
		.site-footer a:focus,
		.sub-menu-toggle:focus,
		.sub-menu-toggle:hover {
			color: %s;
		}
		', $color_link ) : '';

	$css .= ( minimalist_customizer_get_default_accent_color() !== $color_accent ) ? sprintf( '

		button:focus,
		button:hover,
		input:focus[type="button"],
		input:focus[type="reset"],
		input:focus[type="submit"],
		input:hover[type="button"],
		input:hover[type="reset"],
		input:hover[type="submit"],
		.archive-pagination li a:focus,
		.archive-pagination li a:hover,
		.archive-pagination .active a,
		.button:focus,
		.button:hover,
		.more-link:hover {
			background-color: %s;
			color: %s;
		}
		', $color_accent, minimalist_color_contrast( $color_accent ) ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
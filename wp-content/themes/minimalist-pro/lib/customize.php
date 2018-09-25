<?php
/**
 * Minimalist Pro.
 *
 * This file adds the Customizer additions to the Minimalist Pro Theme.
 *
 * @package Twenty Seven
 * @author  Brian Gardner
 * @license GPL-2.0+
 * @link    https://briangardner.com/
 */

/**
 * Get default link color for Customizer.
 *
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for link color.
 */
function minimalist_customizer_get_default_link_color() {
	return '#d43c67';
}

/**
 * Get default accent color for Customizer.
 *
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for accent color.
 */
function minimalist_customizer_get_default_accent_color() {
	return '#d43c67';
}

add_action( 'customize_register', 'minimalist_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.2.3
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function minimalist_customizer_register() {

	global $wp_customize;

	$wp_customize->add_setting(
		'minimalist_link_color',
		array(
			'default'           => minimalist_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'minimalist_link_color',
			array(
				'description' => __( 'Change the default color for entry links, linked titles, menu links, and more.', 'minimalist-pro' ),
			    'label'       => __( 'Link Color', 'minimalist-pro' ),
			    'section'     => 'colors',
			    'settings'    => 'minimalist_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'minimalist_accent_color',
		array(
			'default'           => minimalist_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'minimalist_accent_color',
			array(
				'description' => __( 'Change the default color for button hovers.', 'minimalist-pro' ),
			    'label'       => __( 'Accent Color', 'minimalist-pro' ),
			    'section'     => 'colors',
			    'settings'    => 'minimalist_accent_color',
			)
		)
	);

}

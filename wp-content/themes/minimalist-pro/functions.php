<?php
/**
 * Minimalist Pro.
 *
 * This file adds functions to the Minimalist Pro Theme.
 *
 * @package Minimalist Pro
 * @author  Brian Gardner
 * @license GPL-2.0+
 * @link    https://briangardner.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'minimalist_localization_setup' );
function minimalist_localization_setup(){
	load_child_theme_textdomain( 'minimalist-pro', get_stylesheet_directory() . '/languages' );
}

// Add color select to WordPress theme customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Minimalist Pro' );
define( 'CHILD_THEME_URL', 'http://briangardner.com/themes/minimalist/' );
define( 'CHILD_THEME_VERSION', '2.0' );

// Enqueue scripts and styles.
add_action( 'wp_enqueue_scripts', 'minimalist_scripts_styles' );
function minimalist_scripts_styles() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,500,600,600i', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'minimalist-ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'minimalist-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menus' . $suffix . '.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'minimalist-responsive-menu',
		'genesis_responsive_menu',
		minimalist_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function minimalist_responsive_menu_settings() {
	$settings = array(
		'mainMenu'          => __( 'Menu', 'minimalist-pro' ),
		'menuIconClass'     => 'ionicons-before ion-drag',
		'subMenu'           => __( 'Menu', 'minimalist-pro' ),
		'subMenuIconsClass' => 'ionicons-before ion-ios-arrow-down',
		'menuClasses'       => array(
			'combine' => array(),
			'others'  => array(
				'.nav-primary',
			),
		),
	);
	return $settings;
}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );

// Add accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 1280,
	'height'          => 300,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Rename menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Menu', 'minimalist-pro' ) ) );

// Remove header right widget area.
unregister_sidebar( 'header-right' );

// Remove sidebars.
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

// Remove site layouts.
genesis_unregister_layout( 'content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Force full-width-content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

// Remove navigation meta box.
add_action( 'genesis_theme_settings_metaboxes', 'minimalist_remove_genesis_metaboxes' );
function minimalist_remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {

	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_theme_settings_pagehook, 'main' );

}

// Customize entry meta in entry header.
add_filter( 'genesis_post_info', 'minimalist_entry_meta_header' );
function minimalist_entry_meta_header($post_info) {
 
	$post_info = '[post_author_posts_link] — [post_date] [post_edit]';
	return $post_info;
 
}

// Remove entry meta in entry footer.
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

// Modify size of Gravatar in author box.
add_filter( 'genesis_author_box_gravatar_size', 'minimalist_author_box_gravatar' );
function minimalist_author_box_gravatar( $size ) {

	return 180;

}

// Modify size of Gravatar in entry comments.
add_filter( 'genesis_comment_list_args', 'minimalist_comments_gravatar' );
function minimalist_comments_gravatar( $args ) {

	$args['avatar_size'] = 100;
	return $args;

}

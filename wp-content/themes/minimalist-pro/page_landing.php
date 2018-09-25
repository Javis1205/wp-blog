<?php
/**
 * Miniamlist Pro.
 *
 * This file adds the landing page template to the Minimalist Pro Theme.
 *
 * @package Minimalist Pro
 * @author  Brian Gardner
 * @license GPL-2.0+
 * @link    https://briangardner.com/
 */

// Template Name: Landing

// Remove site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Remove menus.
remove_action( 'genesis_after_header', 'genesis_do_nav' );

// Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');

// Remove site footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

// Remove site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Run the Genesis loop.
genesis();

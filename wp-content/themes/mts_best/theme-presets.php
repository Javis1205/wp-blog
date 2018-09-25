<?php
// make sure to not include translations
$args['presets']['demo-1'] = array(
    'title' => 'Best',
    'demo' => 'http://demo.mythemeshop.com/best',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/demo-1/thumb.jpg', // could use external url, to minimize theme zip size
    'menus' => array( 'secondary-menu' => 'Primary Menu', 'mobile' => 'Primary Menu' ), // menu location slug => Demo menu name
    'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 4 ),
);
$args['presets']['demo-2'] = array(
    'title' => 'Fashion',
    'demo' => 'http://demo.mythemeshop.com/best-fashion',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/demo-2/thumb.jpg', // could use external url, to minimize theme zip size
    'menus' => array( 'secondary-menu' => 'Menu', 'mobile' => '' ), // menu location slug => Demo menu name
    'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 2 ),
);
$args['presets']['demo-3'] = array(
    'title' => 'Viral',
    'demo' => 'http://demo.mythemeshop.com/best-viral',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/demo-3/thumb.jpg', // could use external url, to minimize theme zip size
    'menus' => array( 'secondary-menu' => 'Menu', 'mobile' => 'Menu' ), // menu location slug => Demo menu name
    'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 8 ),
);
$args['presets']['demo-4'] = array(
    'title' => 'Technology',
    'demo' => 'http://demo.mythemeshop.com/best-tech',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/demo-4/thumb.jpg', // could use external url, to minimize theme zip size
    'menus' => array( 'secondary-menu' => 'Menu', 'mobile' => 'Menu' ), // menu location slug => Demo menu name
    'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 4 ),
);
$args['presets']['demo-5'] = array(
    'title' => 'Adult',
    'demo' => 'http://demo.mythemeshop.com/best-adult',
    'thumbnail' => get_template_directory_uri().'/options/demo-importer/demo-files/demo-5/thumb.jpg', // could use external url, to minimize theme zip size
    'menus' => array( 'secondary-menu' => 'Menu', 'mobile' => 'Menu' ), // menu location slug => Demo menu name
    'options' => array( 'show_on_front' => 'posts', 'posts_per_page' => 4 ),
);

global $mts_presets;
$mts_presets = $args['presets'];
<?php

/*==================================================
=                 Theme Introduction               =
==================================================*/

/**
 *
 * About Baked
 * --------------
 * Baked is an elegant theme for the seriously cool food blogger, not some twee pinch of yummer.
 *
 * Credits and Licensing
 * --------------
 * Baked was created by Mark Alston, and is under GPL 2.0+.
 *
 */

/*============================================
=            Begin Functions File            =
============================================*/

/**
 *
 * Define Child Theme Constants
 *
 * @since 1.0.0
 *
 */
define( 'CHILD_THEME_NAME', 'Baked' );
define( 'CHILD_THEME_AUTHOR', 'Mark Alston' );
define( 'CHILD_THEME_AUTHOR_URL', 'http://markalston.co/' );
define( 'CHILD_THEME_URL', 'http://markalston.co/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );
define( 'TEXT_DOMAIN', 'Baked' );

/**
 *
 * Start the engine 
 *
 * @since 1.0.0
 *
 */
include_once( get_template_directory() . '/lib/init.php');

/**
 *
 * Load files in the /assets/ directory
 *
 * @since 1.0.0
 *
 */
add_action( 'wp_enqueue_scripts', 'bk_load_assets' );
function bk_load_assets() {

	/* Load Google Font */
	wp_enqueue_style( 'bk', '//fonts.googleapis.com/css?family=Playfair+Display:400,700|Raleway:400,700', array(), CHILD_THEME_VERSION );

	/* Load JS */
	wp_enqueue_script( 'bk-global', get_stylesheet_directory_uri() . '/assets/js/global.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_enqueue_script( 'bk-responsive-menu', get_stylesheet_directory_uri() . '/assets/js/responsive-menu.js', array( 'jquery', 'bk-global' ), CHILD_THEME_VERSION, true );

	/* Load Icons */
	wp_enqueue_style( 'dashicons' );

	/* Localize Responsive Menu Variables */
	$output = array(
		'mainMenu' => __( 'Menu', 'bk' ),
		'subMenu'  => __( 'Menu', 'bk' ),
	);
	wp_localize_script( 'bk-responsive-menu', 'starterthemeL10n', $output );

}

/**
 *
 * Add theme supports
 *
 * @since 1.0.0
 *
 */
add_theme_support( 'genesis-responsive-viewport' ); /* Enable Viewport Meta Tag for Mobile Devices */
add_theme_support( 'html5',  array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) ); /* HTML5 */
add_theme_support( 'genesis-accessibility', array( 'skip-links', 'search-form', 'drop-down-menu', 'headings' ) ); /* Accessibility */
add_theme_support( 'genesis-after-entry-widget-area' ); /* After Entry Widget Area */
add_theme_support( 'genesis-footer-widgets', 3 ); /* Add Footer Widgets Markup for 3 */


/**
 *
 * Apply custom body classes
 *
 * @since 1.0.0
 * @uses /lib/classes.php
 *
 */
include_once( get_stylesheet_directory() . '/lib/classes.php' );

/**
 *
 * Apply bk defaults (overrides default Genesis settings)
 *
 * @since 1.0.0
 * @uses /lib/defaults.php
 *
 */
include_once( get_stylesheet_directory() . '/lib/defaults.php' );

/**
 *
 * Apply bk default attributes
 *
 * @since 1.0.0
 * @uses /lib/attributes.php
 *
 */
include_once( get_stylesheet_directory() . '/lib/attributes.php' );

<?php
/**
 * Theme functions and definitions
 *
 * @package e-theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0
 */

/**
 * Enqueue scripts and styles.
 */

if ( ! function_exists( '_echild_enqueue_styles' ) ) {
	function _echild_enqueue_styles() {

		// css.
		wp_enqueue_style( '0', get_stylesheet_directory_uri() . '/static/css/0.min.css', '', 'css/0.min.css' );
		wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/static/css/main.min.css', '', 'css/main.min.css' );

		// js.
		wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/static/js/main.min.js', '', 'js/main.min.js', true );
		wp_register_script( 'vendor-js', get_stylesheet_directory_uri() . '/static/js/vendor.min.js', '', 'js/vendor.min.js', true );
		wp_enqueue_style( 'module', get_stylesheet_directory_uri() . '/static/css/module.min.css', '', 'css/module.min.css' );

		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'vendor-js' );

		/**
		 * Conditionally Enqueue
		 *
		 * @link https://dobsondev.com/2015/06/05/conditionally-enqueue-stylesheet-into-wordpress-for-certain-page/
		 * @since 1.0
		 */

		if ( is_front_page() ) {
			wp_register_script( 'module-js', get_stylesheet_directory_uri() . '/static/js/module-377751f19b.min.js', '', 'js/module-377751f19b.min.js', true );
			wp_enqueue_script( 'module-js' );
		}

		if ( is_page_template( 'page-photos.php' ) ) {

			wp_enqueue_style( 'vendor-css', get_stylesheet_directory_uri() . '/static/css/vendor-e6769b6ba4.min.css', '', 'css/vendor-e6769b6ba4.min.css' );
			wp_enqueue_script( 'vendor-js' );
		}
	}
	add_action( 'wp_enqueue_scripts', '_echild_enqueue_styles' );
}

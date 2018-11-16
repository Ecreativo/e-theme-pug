<?php
/**
 * Theme functions and definitions
 *
 * @package	e-theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0
 */

/**
 * Enqueue scripts and styles.
 */
function e_enqueue_styles() {

	wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/static/css/main.min.css', '', 'css/main.min.css');
	
	wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/static/js/main.min.js', '', 'js/main.min.js', true );
	wp_register_script( 'vendor-js', get_stylesheet_directory_uri() . '/static/js/vendor.min.js', '', 'js/vendor.min.js', true );
	wp_enqueue_script( 'main-js' );

  /**
   * Conditionally Enqueue
   *
   *
   * @link https://dobsondev.com/2015/06/05/conditionally-enqueue-stylesheet-into-wordpress-for-certain-page/
   ** @since 1.0
    */

	// if( is_front_page() ) {}
	
	if ( is_page_template( 'page-photos.php' ) ) {

		wp_enqueue_style( 'vendor-css', get_stylesheet_directory_uri() . '/static/css/vendor-e6769b6ba4.min.css', '', 'css/vendor-e6769b6ba4.min.css');
		wp_enqueue_script( 'vendor-js' );
	}

}
add_action( 'wp_enqueue_scripts', 'e_enqueue_styles' );

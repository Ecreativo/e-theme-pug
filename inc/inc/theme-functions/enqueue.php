<?php
/**
  * Enqueue scripts and styles.
	*
	* @version 1.0
	* @since  0.1.0
	*/
	
if ( !function_exists( '_echild_enqueue_styles' ) ) {
	function _echild_enqueue_styles() {

		// css
		wp_enqueue_style( '0', get_stylesheet_directory_uri() . '/static/css/0.min.css', '', 'css/0.min.css');
		wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/static/css/main.min.css', '', 'css/main.min.css');
		
		// js
		wp_register_script( 'main', get_stylesheet_directory_uri() . '/static/js/main.min.js', '', 'js/main.min.js', true );
		wp_register_script( 'vendor', get_stylesheet_directory_uri() . '/static/js/vendor.min.js', '', 'js/vendor.min.js', true );
		wp_enqueue_style( 'module', get_stylesheet_directory_uri() . '/static/css/module.min.css', '', 'css/module.min.css');
		
		wp_enqueue_script( 'main' );
		wp_enqueue_script( 'vendor' );

		/**
		 * Conditionally Enqueue
		 *
		 *
		 * @link https://dobsondev.com/2015/06/05/conditionally-enqueue-stylesheet-into-wordpress-for-certain-page/
		 * @since 1.0
		 */

		if( is_front_page() ) {
			wp_register_script( 'module', get_stylesheet_directory_uri() . '/static/js/module-377751f19b.min.js', '', 'js/module-377751f19b.min.js', true );
			wp_enqueue_script( 'module' );
		}
		
		// if ( is_page_template( 'page-photos.php' ) ) {
		// }
	}
	add_action( 'wp_enqueue_scripts', '_echild_enqueue_styles' );
}
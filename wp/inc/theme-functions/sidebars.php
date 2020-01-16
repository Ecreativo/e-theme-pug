<?php
/**
 * Register widget areas (Sidebars)
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * 
 * @package	_echild
 * @since 1.0
 */
 
if ( !function_exists( '_echild_register_sidebars' ) ) {
 	function _echild_register_sidebars() {
		
		// main sidebar
		register_sidebar( array(
			'name'          => __( 'Main Sidebar', TEXTDOMAIN ),
			'id'            => 'main-sidebar',
			'description'   => __( 'Main sidebar of the site.', TEXTDOMAIN ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			) 
		);
		
		// No results sidebar
		register_sidebar( array(
			'name'          => __( 'No Results Sidebar', TEXTDOMAIN ),
			'id'            => 'no-results-sidebar',
			'description'   => __( 'No Results Sidebar.', TEXTDOMAIN ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			) 
		);
	}
	add_action( 'widgets_init', '_echild_register_sidebars' );
}
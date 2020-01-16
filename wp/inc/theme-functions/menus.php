<?php
/**
 * Register Theme Menus
 *
 * @package	_echild
 * @since 1.0
 */

// Theme support adding changed from 'nav-menus' to just 'menus'
add_theme_support( 'menus' );
 
// Function for registering wp_nav_menu()
if ( !function_exists( '_echild_register_navmenus' ) ) {
	function _echild_register_navmenus() {
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => __( 'Primary', TEXTDOMAIN ),
			'top-navbar' => __( 'Top Navigation', TEXTDOMAIN )
		) );
	}
	add_action( 'init', '_echild_register_navmenus' );
}

/**
 * Add search to menu.
 */
if ( !function_exists( '_echild_add_search_box_to_menu' ) ) {
	function _echild_add_search_box_to_menu( $items, $args ) {
		if( $args->theme_location == 'top-navbar' ) {
			$searchForm = get_search_form(false);
			$items = $items;
			$items .= '<li class="e-menu-search">' . $searchForm . '</li>';
			return $items;
		}
		return $items;	
	}
	add_filter( 'wp_nav_menu_items', '_echild_add_search_box_to_menu', 10, 2 );
}

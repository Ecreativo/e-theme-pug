<?php
/**
 * Theme functions and definitions which enhance the theme by hooking into WordPress
 *
 * @package	_echild
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Define Theme Constants
/*-----------------------------------------------------------------------------------*/

// define( 'E_STATIC', get_stylesheet_directory_uri() . '/static/' );
define( 'E_STATIC', dirname(__FILE__) . '/static/' );
define( 'E_INC', dirname(__FILE__) . '/inc/' );
define( 'TEXTDOMAIN', '_echild');

/* ------------------------------------------------------------------------ */
/* Includes
/* ------------------------------------------------------------------------ */

// Enqueue
require_once( E_INC . 'theme-functions/enqueue.php' );
// Theme Menus
require_once( E_INC . 'theme-functions/menus.php' );
// Theme Sidebars
require_once( E_INC . 'theme-functions/sidebars.php' );
// Custom Pagination
require_once( E_INC . 'theme-functions/custom-pagination.php' );
// Post Thumbnails
require_once( E_INC . 'theme-functions/thumbnails.php' );
// Custom template tags for this theme.
require_once( E_INC . 'theme-functions/template-tags.php' );

if ( ! function_exists( '_echild_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _echild_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_echild' to the name of your theme in all the template files.
		 */
		// load_theme_textdomain( TEXTDOMAIN, get_template_directory() . '/languages' );

		/*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
		// add_theme_support( 'title-tag' );
		
		/*
		 * Add editor style
		 */
		add_editor_style( E_STATIC . '/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', '_echild_setup' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _echild_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', '_echild_body_classes' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _echild_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_echild_content_width', 640 );
}
add_action( 'after_setup_theme', '_echild_content_width', 0 );

function get_pagination( $response, $post, $request ) {
	// Only do this for single post requests.

	// global $post;
	$old_post = $GLOBALS['post'];
	$GLOBALS['post'] = (object)$post;
	
	// for a custom_taxonomy_name 
	// $next = get_adjacent_post( true, '', false, 'my_custom_taxonomy_name' );
  // $previous = get_adjacent_post( true, '', true, 'my_custom_taxonomy_name' );

	// Get the so-called next post.
	$next = get_adjacent_post( false, '', false );
	// Get the so-called previous post.
	$previous = get_adjacent_post( false, '', true );

	// Format them a bit and only send id and slug (or null, if there is no next/previous post).
	$response->data['pagination']['next'] = ( is_a( $next, 'WP_Post') ) ? array( "id" => $next->ID, "slug" => $next->post_name, "title" => $next->post_title ) : null;
	$response->data['pagination']['previous'] = ( is_a( $previous, 'WP_Post') ) ? array( "id" => $previous->ID, "slug" => $previous->post_name, "title" => $previous->post_title ) : null;
	
	// Reset global post to its old value
	$GLOBALS['post'] = $old_post;
	
	return $response;
}
// Add filter to respond with next and previous post in post response.
add_filter( 'rest_prepare_post', 'get_pagination', 10, 3 );

// Replace Posts label as Articles in Admin Panel 

function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Articles';
	$submenu['edit.php'][5][0] = 'Articles';
	$submenu['edit.php'][10][0] = 'Add Articles';
	echo '';
}
function change_post_object_label() {
			global $wp_post_types;
			$labels = &$wp_post_types['post']->labels;
			$labels->name = 'Articles';
			$labels->singular_name = 'Article';
			$labels->add_new = 'Add Article';
			$labels->add_new_item = 'Add Article';
			$labels->edit_item = 'Edit Article';
			$labels->new_item = 'Article';
			$labels->view_item = 'View Article';
			$labels->search_items = 'Search Articles';
			$labels->not_found = 'No Articles found';
			$labels->not_found_in_trash = 'No Articles found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
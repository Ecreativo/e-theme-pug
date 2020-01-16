<?php
/**
 * Register thumbnails
 *
 * @package	_echild
 * @since 1.0
 */

// Add support for WP 2.9+ post thumbnails
add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 189, 189, true ); // default Post Thumbnail dimensions

// banners
add_image_size( 'page-header-bkg-h', 9999, 680, true ); //content banners

// home banner
// Disable temporaly
// add_image_size( 'home_slider_375w', 375 );
// add_image_size( 'home_slider_576w', 576 );
// add_image_size( 'home_slider_750w', 750 );
// add_image_size( 'home_slider_992w', 992 );
// add_image_size( 'home_slider_1152w', 1152 );
// add_image_size( 'home_slider_1200w', 1200 );
// add_image_size( 'home_slider_1480w', 1480 );
// add_image_size( 'home_slider_1536w', 1536 );
// add_image_size( 'home_slider_1984w', 1984 );
// add_image_size( 'home_slider_2400w', 2400 );
// add_image_size( 'home_slider_2960w', 2960 );
// add_image_size( 'home_slider_4096w', 4096 );
// add_image_size( 'home_slider_5120w', 5120 );

// Post images
add_image_size( 'blog-thumbs', 750, 400, true );
add_image_size( 'blog-thumbs-w', 750 ); // blog thumbs

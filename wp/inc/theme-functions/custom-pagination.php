<?php
/**
 * Theme Custom Pagination
 *
 * @package	_echild
 * @since 1.0
 */

if ( !function_exists( '_echild_custom_pagination' ) ) {
	function _echild_custom_pagination( $pages = '', $range = 3 ) {
		$showitems = ( $range * 2 ) + 1;
		
		global $paged;

		if ( empty( $paged ) ) $paged = 1;
		
		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( !$pages ) {
				$pages = 1;
			}
		}
			
		if ( 1 != $pages ) {
			echo "<ul class=\"pagination e-pagination\">";
			if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) echo "<li class=\"page-item\"><a class=\"first-page page-link\" href='" . get_pagenum_link( 1 ) . "'><i class=\"fa fa-angle-double-left\"></i> " . __( 'First', '_echild' ) . "</a></li>";
			if ( $paged > 1 && $showitems < $pages ) echo "<li class=\"page-item\"><a class=\"page-link previous-page\" href='" . get_pagenum_link( $paged - 1 ) . "'><i class=\"fa fa-angle-left\"></i></a></li>";
			
			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 != $pages &&( !( $i >= $paged + $range + 1 || $i <= $paged-$range - 1) || $pages <= $showitems ) ) {
					echo ( $paged == $i ) ? "<li class=\"active page-item\"><a class=\"page-link\">" . $i . "</a></li>" : "<li class=\"page-item\"><a href='" . get_pagenum_link( $i ) . "' class=\"page-link\">" . $i . "</a></li>";
				}
			}
		
			if ( $paged < $pages && $showitems < $pages ) echo "<li class=\"page-item\"><a class=\"page-link next-page\" href=\"" . get_pagenum_link( $paged + 1 ) . "\"> <i class=\"fa fa-angle-right\"></i></a></li>";
			if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) echo "<li class=\"page-item\"><a class=\"page-link last-page\" href='" . get_pagenum_link( $pages ) . "'>" . __( 'Last', '_echild' ) . " <i class=\"fa fa-angle-double-right\"></i></a></li>";
			echo "</ul>";
		}
			
	}
}
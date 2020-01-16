<?php
/**
 * Custom template tags for this theme (like get_header get_footer get_sidebar get_bloginfo wp_title)
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package e-child-theme
 */

if ( ! function_exists( '_echild_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function _echild_posted_on() {
		$timeetring = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$timeetring = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$timeetring = sprintf( $timeetring,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %e: post date. */
			esc_html_x( 'Posted on %e', 'post date', TEXTDOMAIN ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $timeetring . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( '_echild_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function _echild_posted_by() {
		$byline = sprintf(
			/* translators: %e: post author. */
			esc_html_x( 'by %e', 'post author', TEXTDOMAIN ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( '_echild_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _echild_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', TEXTDOMAIN ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', TEXTDOMAIN ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', TEXTDOMAIN ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', TEXTDOMAIN ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %e: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %e</span>', TEXTDOMAIN ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %e: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%e</span>', TEXTDOMAIN ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( '_echild_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function _echild_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( iseingular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End iseingular().
	}
endif;

/**
 * Return the postmeta values for the passed metakey
 * @param string $meta_key
 * @param string $output
 * @return mixed|wp_error
 */
if(!function_exists('_echild_get_metavalues')){
	function _echild_get_metavalues($meta_key = '', $output = ARRAY_A){
			global $wpdb;
	
			$result = $wpdb->get_results($wpdb->prepare(
					"SELECT `meta_value` FROM {$wpdb->postmeta} WHERE `meta_key` = '{$meta_key}'"
			),$output);
	
			return $result;
	}
}

if(!function_exists('_echild_get_the_slug')){
	/** Return the post slug
	 * 
	
	 * @version 3.0
	 * @since 27 Aug 2014
	 * @package e_parent
	 *
	 */
	function _echild_get_the_slug( $post = 0 ){
		$post = _echild_get_post( $post );

		$slug = isset( $post->post_name ) ? $post->post_name : '';

		return $slug;
	}
}

if(!function_exists('_echild_the_slug')){
	/** Get the post slug
	 * 
	
	 * @version 3.0
	 * @since 27 Aug 2014
	 * @package e_parent
	 *
	 */
	function _echild_the_slug(){
		echo _echild_get_the_slug();
	}
}

if(!function_exists('_echild_get_the_post_thumbnail_url')){
	/** Return the post thumnail url source
	 * 
	
	 * @version 3.0
	 * @since 27 Aug 2014
	 * @package e_parent
	 *
	 * @param string $image_size
	 * @return string
	 */
	function _echild_get_the_post_thumbnail_url($image_size){
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, $image_size, true);
		return $thumb_url_array[0];
	}
}

if(!function_exists('_echild_the_post_thumbnail_url')){
	/** Get the post thumbnail url source
	 * 
	
	 * @version 3.0
	 * @since 27 Aug 2014
	 * @package e_parent
	 *
	 * @param string $image_size
	 * @return string
	 */
	function _echild_the_post_thumbnail_url($image_size){
		echo _echild_get_the_post_thumbnail_url($image_size);
	}
}

/**
 * Get the page title for the archive, category and date pages
 * @package	_echild
 * @since 1.0
 * @return [type] [description]
 */
if ( !function_exists( '_echild_get_page_title' ) ) {
	function _echild_get_page_title() {
		if( is_post_type_archive() ) :
			if (isset($_REQUEST['department'])) {
				$page_title = $_REQUEST['department'];
			}else {
				$page_title = post_type_archive_title('', false);
			}
		elseif ( is_home() ) :
			$page_title = 'latest News'; //single_post_title();
		elseif ( is_category() ) :
			if (isset($_REQUEST['department'])) {
				$page_title = $_REQUEST['department'];
			}else {
				$page_title = single_cat_title('', false);
			}
		elseif( is_tag() ) :
			$page_title = single_tag_title('', false);
		elseif( is_tax() ) :
			$page_title = get_queried_object()->name;
		elseif ( get_the_ID() == 2254 ) :
			$page_title = 'Taleem-ul-Quran';
		elseif ( is_day() ) :
			$page_title = get_the_time('j F Y');
		elseif ( is_month() ) :
			$page_title = get_the_time('F Y');
		elseif ( is_year() ) :
			$page_title = get_the_time('Y');
		elseif ( is_404() ) :
			$page_title = __('Nothing Found', TEXTDOMAIN);
		elseif ( is_search() ) :
			$page_title = sprintf( __( 'Search Results for <span class="colour">%1s</span>', TEXTDOMAIN ), get_search_query() );
		else :
			$page_title = get_the_title();
		endif;

		return $page_title;
	}
}

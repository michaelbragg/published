<?php
/**
 * Template Tags
 *
 * Functions that wrap other more complicated functionality for a template to use.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Includes\TemplateTags
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */

if ( ! function_exists( 'ti_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function ti_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: the date the post was published */
			esc_html_x( 'Posted on %s', 'post date', '_s' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: the post author */
			esc_html_x( 'by %s', 'post author', '_s' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		 echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( '_s_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _s_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$categories_list = get_the_category_list( esc_html__( ', ', '_s' ) );
			if ( $categories_list && ti_categorized_blog() ) {
				printf( // WPCS: XSS OK.
					/* translators: used between list items, there is a space after the comma */
					'<span class="cat-links">' . esc_html__( 'Posted in %1$s', '_s' ) . '</span>',
					$categories_list
				);
			}

			$tags_list = get_the_tag_list( '', esc_html__( ', ', '_s' ) );
			if ( $tags_list ) {
				printf( // WPCS: XSS OK.
					/* translators: used between list items, there is a space after the comma */
					'<span class="tags-links">' . esc_html__( 'Tagged %1$s', '_s' ) . '</span>',
					$tags_list
				);
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__(
							'Leave a Comment <span class="screen-reader-text">on %s</span>',
							'ti_published'
						),
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
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', '_s' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ti_categorized_blog() {

	// Get the categories.
	$all_the_cool_cats = get_transient( 'ti_categories' );

	if ( false === $all_the_cool_cats ) {

		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'ti_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so ti_categorized_blog should return true.
		return true;
	}

	// This blog has only 1 category so ti_categorized_blog should return false.
	return false;
}

/**
 * Flush out the transients used in ti_categorized_blog.
 */
function ti_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ti_categories' );
}
add_action( 'edit_category', 'ti_category_transient_flusher' );
add_action( 'save_post',     'ti_category_transient_flusher' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param  array $classes Classes for the body element.
 * @return array
 */
function ti_body_classes( $classes ) {

	global $post;

	// Adds 'post type - page slug' to body class.
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}

add_filter(
	'body_class',
	'ti_body_classes'
);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ti_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}

add_action(
	'wp_head',
	'ti_pingback_header'
);

/**
 * Alter the default WP Query.
 *
 * @param array $query Supplied by pre_get_posts.
 */
function change_archive_query_loop( $query ) {
	if ( $query->is_main_query() && ! is_admin() ) {
		$query->set( 'order', 'DESC' );
		$query->set( 'orderby', 'modified date' );
	}
}

add_action(
	'pre_get_posts',
	'change_archive_query_loop'
);

/**
 * Return SVG markup.
 *
 * @param  array $args Icon, Title, and Description strings.
 * @return string SVG markup.
 */
function ti_get_svg( $args = array() ) {
	/**
	 * Make sure $args are an array.
	 */
	if ( empty( $args ) ) {
		return esc_html__(
			'Please define default parameters in the form of an array.',
			'ti_published'
		);
	}
	// Define a type.
	if ( false === array_key_exists( 'type', $args ) ) {
		return esc_html__(
			'Please define an SVG type.',
			'ti_published'
		);
	}

	// Set defaults.
	$defaults = array(
		'type'    => '',
		'name'    => '',
		'class'   => '',
		'title'   => '',
		'desc'    => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );
	// Figure out which title to use.
	$title = ( $args['title'] ) ? $args['title'] : $args['type'];
	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';
	// Set ARIA.
	$aria_labelledby = '';
	if ( $args['title'] && $args['desc'] ) {
		$aria_labelledby = ' aria-labelledby="title-ID desc-ID"';
		$aria_hidden = '';
	}
	// Begin SVG markup.
	$svg = '<svg class="o-' . esc_attr( $args['type'] ) . ' c-' . esc_attr( $args['type'] ) . '--' . esc_attr( $args['name'] ) . ' ' . esc_attr( $args['class'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';
	// Add title markup.
	$svg .= '<title>' . esc_html( $title ) . '</title>';
	// If there is a description, display it.
	if ( $args['desc'] ) {
		$svg .= '<desc>' . esc_html( $args['desc'] ) . '</desc>';
	}
	// Use absolute path in the Customizer so that icons show up in there.
	if ( is_customize_preview() ) {
		$svg .= '<use xlink:href="' . get_parent_theme_file_uri( '/assets/images/' . esc_attr( $args['type'] ) . '.svg#' . esc_attr( $args['type'] ) . '-' . esc_html( $args['name'] ) ) . '"></use>';
		$svg .= '</svg>';
		return $svg;
	}
	$svg .= '<use xlink:href="#' . esc_html( $args['type'] ) . '-' . esc_html( $args['name'] ) . '"></use>';
	$svg .= '</svg>';
	return $svg;
}

/**
 * Echo SVG markup.
 *
 * @param  array $args Icon, Title, and Description strings.
 */
function ti_the_svg( $args = array() ) {
	echo ti_get_svg( $args ); // WPCS: XSS OK. Escaped within function.
}


/**
 * Copyright.
 *
 * @TODO Extract to own plugin with to store in option table.
 */
function the_copyright() {
	esc_html_e( '&copy; 2002–2017 Michael Bragg', 'ti_published' );
}

/**
 * Add custom CSS class by to body element.
 *
 * @param  array $classes An array of body classes.
 * @return array          An array of post classes.
 */
function ti_check_featured_image( $classes ) {

	if ( is_archive() || is_home() || is_front_page() || is_search() ) {
		return $classes;
	}

	if ( has_post_thumbnail() ) {
		return array_merge( $classes, array( 'has-featured-image' ) );
	}

	return $classes;

}

add_filter(
	'body_class',
	'ti_check_featured_image'
);

/**
 * Only want the class applied to singular pages.
 *
 * @param  array $classes An array of post classes.
 * @return array          An array of post classes.
 */
function ti_scope_single_view( $classes ) {

	if ( is_singular() ) {
		return array_merge( $classes, array( 's-content' ) );
	}

	return $classes;

}

add_filter(
	'post_class',
	'ti_scope_single_view'
);

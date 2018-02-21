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
		$svg .= '<use xlink:href="' . get_parent_theme_file_uri( '/ui/' . esc_attr( $args['type'] ) . '.svg#' . esc_attr( $args['type'] ) . '-' . esc_html( $args['name'] ) ) . '"></use>';
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
	esc_html_e( '&copy; 2002–2018 Michael Bragg', 'ti_published' );
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

<?php
/**
 * Custom function to add additional hooks to `get_search_form();`.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Includes\TIGetSearchForm
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://developer.wordpress.org/themes/basics/including-css-javascript/
 */

/**
 * Display search form.
 *
 * Will first attempt to locate the searchform.php file in either the child or
 * the parent, then load it. If it doesn't exist, then the default search form
 * will be displayed. The default search form is HTML, which will be displayed.
 * There is a filter applied to the search form HTML in order to edit or replace
 * it. The filter is {@see 'get_search_form'}.
 *
 * This function is primarily used by themes which want to hardcode the search
 * form into the sidebar and also by the search widget in WordPress.
 *
 * There is also an action that is called whenever the function is run called,
 * {@see 'pre_get_search_form'}. This can be useful for outputting JavaScript that the
 * search relies on or various formatting that applies to the beginning of the
 * search. To give a few examples of what it can be used for.
 *
 * @since 2.7.0
 *
 * @param bool $echo Default to echo and not return the form.
 * @return string|void String when $echo is false.
 *
 * @SuppressWarnings(PHPMD) Modification of WordPress function.
 */
function ti_get_search_form( $echo = true ) {
	/**
	 * Fires before the search form is retrieved, at the start of get_search_form().
	 *
	 * @since 2.7.0 as 'get_search_form' action.
	 * @since 3.6.0
	 *
	 * @link https://core.trac.wordpress.org/ticket/19321
	 */
	do_action( 'pre_get_search_form' );

	$format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';

	/**
	 * Filters the HTML format of the search form.
	 *
	 * @since 3.6.0
	 *
	 * @param string $format The type of markup to use in the search form.
	 *                       Accepts 'html5', 'xhtml'.
	 */
	$format = apply_filters( 'search_form_format', $format );

	$classes = array( 'search-submit' );

	/**
	 * Filters the CSS class(es) applied to form submit element.
	 *
	 * @since 4.8.1
	 *
	 * @param array    $classes The CSS classes that are applied to the forms
	 *                          submit element.
	 */
	$classes = apply_filters( 'get_search_form_classes', $classes );

	$class_names = implode( ' ', $classes );

	$search_form_template = locate_template( 'searchform.php' );
	if ( '' !== $search_form_template ) {
		ob_start();
		require( $search_form_template );
		$form = ob_get_clean();
	} else {
		if ( 'html5' === $format ) {
			$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
					<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
				</label>
				<input type="submit" class="' . esc_attr( $class_names ) . '" value="' . esc_attr_x( 'Search', 'submit button' ) . '" />
			</form>';
		} else {
			$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
				<div>
					<label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label' ) . '</label>
					<input type="text" value="' . get_search_query() . '" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="' . esc_attr_x( 'Search', 'submit button' ) . '" />
				</div>
			</form>';
		}
	}

	/**
	 * Filters the HTML output of the search form.
	 *
	 * @since 2.7.0
	 *
	 * @param string $form The search form HTML output.
	 */
	$result = apply_filters( 'get_search_form', $form );

	if ( null === $result ) {
		$result = $form;
	}

	if ( $echo ) {
		echo $result; // WPCS: XSS OK.
	} else {
		return $result;
	}
}

/**
 * Add custom classes to forms submit element.
 *
 * @param  array $classes Submit element classses.
 * @return array          Modified submit element classes.
 */
function my_ti_get_search_form_classes( $classes ) {

	$custom_classes = array( 'c-btn', 'c-btn--primary' );

	return array_merge( $classes, $custom_classes );

}

add_filter(
	'get_search_form_classes',
	'my_ti_get_search_form_classes'
);

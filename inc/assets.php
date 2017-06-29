<?php
/**
 * Register and load styles and scripts when required.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Includes\Assets
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://developer.wordpress.org/themes/basics/including-css-javascript/
 */

/**
 * Register scripts.
 */
function ti_register_scripts() {

	/**
	 * Fonts from typekit.
	 */
	wp_register_script(
		'typekit',
		'//use.typekit.net/eqb8ahz.js'
	);

	wp_add_inline_script(
		'typekit',
		'try{Typekit.load({ async: true });}catch(e){}'
	);

}

add_action(
	'wp_enqueue_scripts',
	'ti_register_scripts',
	1
);

/**
 * Register styles.
 */
function ti_register_styles() {

	wp_register_style(
		'ti-published-styles',
		get_stylesheet_uri(),
		array(),
		'1.0.0'
	);

}

add_action(
	'wp_enqueue_scripts',
	'ti_register_styles',
	1
);

/**
 * Dequeue scripts.
 */
function ti_dequeue_scripts() {

	if ( ! is_page( 8 ) ) {
		wp_dequeue_script( 'wp-api-ccf' );
	}
}

add_action(
	'wp_print_scripts',
	'ti_dequeue_scripts',
	100
);

/**
 * Dequeue styles.
 */
function ti_dequeue_styles() {

}

add_action(
	'wp_print_styles',
	'ti_dequeue_styles',
	100
);

/**
 * Enqueue scripts
 */
function ti_enqueue_scripts() {

	/**
	 * Scripts to be loaded globally.
	 */
	wp_enqueue_script( 'typekit' );

}

add_action(
	'wp_enqueue_scripts',
	'ti_enqueue_scripts',
	100
);

/**
 * Enqueue styles
 */
function ti_enqueue_styles() {
	/**
	 * Styles to be loaded globally.
	 */
	wp_enqueue_style( 'ti-published-styles' );
}

add_action(
	'wp_enqueue_scripts',
	'ti_enqueue_styles',
	100
);

/**
 * Add SVG definitions to footer.
 */
function ti_include_svg_icons() {
	/**
	 * Define SVG sprite file.
	 */
	$svg_icons = get_template_directory() . '/ui/icons.svg';
	/**
	 * If it exists, include it.
	 */
	if ( file_exists( $svg_icons ) ) {
		echo '<div style="height: 0; width: 0; position: absolute; bottom: 0; visibility: hidden;">';
				include_once $svg_icons;
		echo '</div>';
	}
	/**
	 * Define SVG sprite file.
	 */
	$svg_logos = get_template_directory() . '/ui/logos.svg';
	/**
	 * If it exists, include it.
	 */
	if ( file_exists( $svg_logos ) ) {
		echo '<div style="height: 0; width: 0; position: absolute; bottom: 0; visibility: hidden;">';
		include_once $svg_logos;
		echo '</div>';
	}
}

add_action(
	'wp_footer',
	'ti_include_svg_icons',
	9999
);

<?php
/**
 * Functions and Definitions.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Footer\Default
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'ti_published_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features,
	 * such as indicating support for post thumbnails.
	 */
	function ti_published_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain(
			'ti_published',
			get_template_directory() . '/languages'
		);

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support(
			'automatic-feed-links'
		);

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support(
			'title-tag'
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support(
			'post-thumbnails'
		);

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus(
			array(
				'navigation-site'             => esc_html__( 'Site Navigation', 'ti_published' ),
				'navigation-footer-primary'   => esc_html__( 'Footer Primary Navigation', 'ti_published' ),
				'navigation-footer-secondary' => esc_html__( 'Footer Secondary Navigation', 'ti_published' ),
			)
		);

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support(
			'customize-selective-refresh-widgets'
		);

	}
endif;

add_action(
	'after_setup_theme',
	'ti_published_setup'
);

/**
 * Load functions files
 */
$function_includes = array(
	'inc/assets.php',
	'inc/media.php',
	'inc/template-tags.php',
	'inc/ti-get-search-form.php',
);

foreach ( $function_includes as $file ) {

	$filepath = locate_template( $file );

	if ( ! $filepath ) {
		// @TODO Report file not found.
		continue;
	}
	include_once $filepath;
}

unset( $file, $filepath );

/**
 * Append custom CSS classe(s) to modify the layout of `wp_nav_menu()`.
 *
 * @param  array  $classes  Nav menu item classes.
 * @param  object $items    Nav menu item data object.
 * @param  array  $args     Nav menu arguments.
 * @return array            New Nav menu item classes.
 *
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
function ti_custom_nav_class( $classes, $items, $args ) {

	$custom_classes = array();

	if ( 'navigation-site' === $args->menu ) {
		$custom_classes[] = 'c-navigation-site__item';
		$custom_classes[] = 'o-list-block__item';
	}

	if ( 'navigation-footer-primary' === $args->menu ) {
		$custom_classes[] = 'o-list-inline__item';
	}

	if ( 'navigation-footer-secondary' === $args->menu ) {
		$custom_classes[] = 'o-list-inline_item';
	}

	return array_merge( $classes, $custom_classes );

}

add_filter(
	'nav_menu_css_class',
	'ti_custom_nav_class',
	10,
	3
);

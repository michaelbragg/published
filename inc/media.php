<?php
/**
 * Media
 *
 * All funcations to control media.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Includes\Media
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */

/**
 * Custom images sizes required by theme.
 *
 * @version 1.0.0
 * @since   1.0.0
 */
function ti_image_sizes() {
	// Add Image Sizes.
}

add_action(
	'after_setup_theme',
	'ti_image_sizes'
);

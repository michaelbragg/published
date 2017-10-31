<?php
/**
 * Module: Single - Byline
 *
 * Prints HTML with meta information for the categories, tags and comments.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Module\Entry\Footer
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */

	// Hide category and tag text for pages.
if ( 'post' === get_post_type() ) {

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

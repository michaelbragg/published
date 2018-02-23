<?php
/**
 * Module: Single - Byline
 *
 * Template part for displaying posts.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Module\Single\Byline
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */

$byline = sprintf(
	/* translators: the post author */
	esc_html_x( 'by %s', 'post author', '_s' ),
	'<li class="c-byline__item c-byline__author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></li>'
);

$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

$time_string = sprintf(
	$time_string,
	esc_attr( get_the_date( 'c' ) ),
	esc_html( get_the_date() ),
	esc_attr( get_the_modified_date( 'c' ) ),
	esc_html( get_the_modified_date() )
);
	?>

<ul class="c-byline o-list-bare">
	<?php echo $byline; // WPCS: Xss. Ok. ?>
	<?php $posted_on = printf(
		/* translators: the date the post was published */
		esc_html_x( 'Published %s', 'post date', 'ti-published' ),
		'<li class="c-byline__item c-byline__published">' . $time_string . '</li>'
	);?>
	<?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) : ?>
		<li class="c-byline__item c-byline__updated">
			Updated <time datetime="<?php the_modified_date( 'Y-m-dTH:i' ); ?>"><?php the_modified_date(); ?></time>
		</li>
	<?php endif; ?>
</ul>

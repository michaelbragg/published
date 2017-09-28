<?php

$byline = sprintf(
	/* translators: the post author */
	esc_html_x( 'by %s', 'post author', '_s' ),
	'<li class="c-byline__item c-byline__author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></li>'
);

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
	esc_html_x( 'Published %s', 'post date', 'ti-published' ),
	'<li class="c-byline__item c-byline__published">' . $time_string . '</li>'
);

 ?>

<ul class="c-byline o-list-bare">
	<?php echo $byline; ?>
	<?php echo $posted_on; ?>
	<?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) { ?>
	<li class="c-byline__item c-byline__updated">Updated <time>November 26, 1985</time></li>
	<?php } ?>
</ul>

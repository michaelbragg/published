<?php
/**
 * Module: Content – Default
 *
 * Template part for displaying posts.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Module\Content\Default
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://codex.wordpress.org/Template_Hierarchy
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'o-content' ); ?>>

	<?php if ( is_singular() && has_post_thumbnail( ) ) : ?>
		<figure class="o-content__bleed">
			<?php the_post_thumbnail(); ?>
		</figure>
	<?php endif; ?>

	<header class="c-entry--header o-content__pull--right">
	<?php
	if ( is_singular() ) :
		the_title(
			'<h1 class="c-heading--page">',
			'</h1>'
		);
	else :
		the_title(
			'<h2 class="c-heading--main"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
			'</a></h2>'
		);
	endif;

	if ( 'post' === get_post_type() ) : ?>
		<div class="c-entry--meta">
		<?php ti_posted_on(); ?>
		</div>
	<?php endif; ?>

	</header>

	<?php if ( is_home() || is_archive() ) : ?>
	<?php the_excerpt(); ?>
	<?php else : ?>
	<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. */
							__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ti_published' ),
							array(
							'span' => array(
								'class' => array(),
							),
							)
						),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					)
				);

				wp_link_pages(
					array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ti_published' ),
					'after'  => '</div>',
					)
				);
	?>
	<?php endif; ?>

	<footer class="c-entry--footer">
		<?php do_action( 'ti_published_entry_footer' ); ?>
		<?php _s_entry_footer(); ?>
	</footer>

</article><!-- #post-<?php the_ID(); ?> -->

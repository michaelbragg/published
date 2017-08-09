<?php
/**
 * Module: Content – Search
 *
 * Template part for displaying results in search pages.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Module\Content\Search
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://codex.wordpress.org/Template_Hierarchy
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'o-content' ); ?>>

	<header class="c-entry--header o-content__pull--right">

		<?php
		the_title(
			sprintf(
				'<h2 class="c-heading--main"><a href="%s" rel="bookmark">',
				esc_url( get_permalink() )
			),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="c-entry--meta">
			<?php ti_posted_on(); ?>
			</div>
		<?php endif; ?>

	</header>

	<?php the_excerpt(); ?>

	<footer class="c-entry--footer">
	<?php _s_entry_footer(); ?>
	</footer>

</article><!-- #post-<?php the_ID(); ?> -->

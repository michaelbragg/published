<?php
/**
 * Module: Content – None
 *
 * Template part for displaying a message that posts cannot be found.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Module\Content\None
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://codex.wordpress.org/Template_Hierarchy
 */

?>

<article <?php post_class( 'no-results not-found o-content' ); ?>>

	<header class="c-entry--header o-content__pull--right">
		<h1 class="c-heading--page">
			<?php esc_html_e( 'Nothing Found', 'ti_published' ); ?>
		</h1>
	</header>

	<?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) :
	?>

		<p>
		<?php
		printf(
			wp_kses(
				/* translators: the edit post url */
				__(
					'Ready to publish your first post? <a href="%1$s">Get started here</a>.',
					'ti_published'
				),
				array(
					'a' => array(
						'href' => array(),
					),
				)
			),
			esc_url( admin_url( 'post-new.php' ) )
		);
		?>
		</p>

		<?php elseif ( is_search() ) : ?>

			<p>
				<?php
				esc_html_e(
					'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
					'ti_published'
				);
				?>
			</p>

			<footer class="c-entry--footer">
				<?php ti_get_search_form(); ?>
			</footer>

		<?php else : ?>

			<p>
				<?php
				esc_html_e(
					'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
					'ti_published'
				);
				?>
			</p>

			<footer class="c-entry--footer">
				<?php ti_get_search_form(); ?>
			</footer>

		<?php endif; ?>

</article>

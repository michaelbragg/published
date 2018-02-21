<?php
/**
 * Singular
 *
 * Template file to display single pages and posts.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Singular\Default
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @link       https://codex.wordpress.org/Template_Hierarchy
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */

?>

<?php get_header(); ?>

<main role="main" id="content">

	<?php if ( have_posts() ) : ?>

		<?php
		/**
		 * Start the Loop.
		 */
		?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'o-content s-article' ); ?>>

	<header class="c-entry--header">

		<?php /* @TODO Better formatting for muliple categories. */ ?>
		<?php $categories = get_the_category( get_the_ID() ); ?>
		<?php if ( $categories ) : ?>
		<p class="c-heading--section">
			<?php foreach ( $categories as $category ) { ?>
			<?php echo esc_html( $category->name ); ?>
			<?php } ?>
		</p>
		<?php endif; ?>

	<?php
	the_title(
		'<h1 class="c-heading--headline">',
		'</h1>'
	);

	if ( 'post' === get_post_type() ) :
	?>
		<div class="c-entry--meta">
			<?php
			get_template_part(
				'module-templates/entry',
				'byline'
			);
			?>
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
		<?php get_template_part( 'module-templates/entry', 'footer' ); ?>
	</footer>

</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'module-templates/content', 'none' ); ?>

	<?php endif; ?>

</main>

<?php get_footer(); ?>

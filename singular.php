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

			<?php get_template_part( 'module-templates/content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'module-templates/content', 'none' ); ?>

	<?php endif; ?>

</main>

<?php get_footer(); ?>

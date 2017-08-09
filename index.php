<?php
/**
 * Default
 *
 * The main template file. Required file for a theme.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Default
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

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

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

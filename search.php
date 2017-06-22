<?php
/**
 * Search
 *
 * The template for displaying search results pages.
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Search
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

?>
<?php get_header(); ?>

<main role="main" id="content">

<?php if ( have_posts() ) : ?>

	<div class="o-content">
		<header class="c-entry--header o-content__pull--right">

			<p class="c-heading--page-sub">
				<?php esc_html_e( 'Search Results for:', 'ti_published' ); ?>
			</p>

			<h1 class="c-heading--page">
				<?php the_search_query(); ?>
			</h1>
		</header>
	</div>
	
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'module-templates/content', 'search' ); ?>
	<?php endwhile; ?>

	<?php the_posts_navigation(); ?>

<?php else : ?>

	<?php get_template_part( 'module-templates/content', 'none' ); ?>

<?php endif; ?>

</main>

<?php get_footer(); ?>

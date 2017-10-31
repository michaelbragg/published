<?php
/**
 * Footer: Default
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Footer\Default
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>

<footer class="c-footer-site--parent">

	<div class="o-layout__container c-footer-site">

		<div class="c-navigation-footer">

			<p class="c-copyright"><?php the_copyright(); ?></p>

			<?php
			wp_nav_menu(
				array(
					'menu'           => 'navigation-footer-primary',
					'menu_class'     => 'o-list-inline c-navigation-footer',
					'container'      => false,
					'theme_location' => 'navigation-footer-primary',
					'depth'          => 1,
					'items_wrap'     => '<ul class="%2$s" id="%1$s">%3$s</ul>',
				)
			);
			?>

		</div>

		<?php
		wp_nav_menu(
			array(
				'menu'           => 'navigation-footer-secondary',
				'menu_class'     => 'o-list-inline c-footer__social-media',
				'container'      => false,
				'theme_location' => 'navigation-footer-secondary',
				'fallback_cb'    => false,
				'depth'          => 1,
				'items_wrap'     => '<ul class="%2$s" id="%1$s">%3$s</ul>',
			)
		);
		?>

	</div>
		
</footer>

<?php wp_footer(); ?>

</body>
</html>

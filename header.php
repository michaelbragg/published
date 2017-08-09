<?php
/**
 * Header: Default
 *
 * @package    ThoughtsIdeas\Published
 * @subpackage Header\Default
 * @version    1.0.0
 * @author     Thoughts & Ideas <hello@thoughtsideas.uk>
 * @copyright  Copyright (c) 2017 Thoughts & Ideas
 * @license    https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if ( function_exists( 'HM_GTM\tag' ) ) {
		HM_GTM\tag();
	}
	?>

		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'ti_published' ); ?>
		</a>

		<header class="c-header-site__parent" role="banner" id="masthead">

			<div class="c-header-site">

				<div class="c-header-site__brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php
						ti_the_svg(
							array(
								'type'          => 'logo',
								'name'          => 'michael-bragg',
								'class'         => 'c-logo--masthead',
								'title'         => 'Michael Bragg',
								'description'   => ' – A designer who codes',
							)
						);
						?>
					</a>
				</div>

				<nav
					class="c-header-site__navigation c-navigation-site"
					role="navigation"
					id="site-navigation"
				>

					<?php
					wp_nav_menu(
						array(
							'menu'           => 'navigation-site',
							'menu_class'     => 'o-list-block o-list-block--full',
							'container'      => false,
							'theme_location' => 'navigation-site',
							'depth'          => 1,
							'items_wrap'     => '<ul class="%2$s" id="%1$s">%3$s</ul>',
						)
					);
					?>

				</nav>

			</div>

		</header>

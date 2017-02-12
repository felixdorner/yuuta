<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package yuuta
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'yuuta' ); ?></a>

		<header id="masthead" class="site-header" role="banner">

			<div class="site-branding">

        <?php
        if ( ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) ) :
					jetpack_the_site_logo();
				elseif ( has_custom_logo() ) :
          the_custom_logo();
        endif;
        ?>

        <?php if ( current_theme_supports( 'custom-header', 'header-text' ) ) : ?>
          <?php if ( display_header_text() ) { ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php } ?>
        <?php else : ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>

			</div>

			<?php get_search_form(); ?>

			<a class="primary-nav-trigger" href="javascript:void(0)">
				<span class="menu-icon"></span>
			</a>

			<a class="search-trigger" href="javascript:void(0)"></a>

		</header>

		<div class="site-navigation-wrapper">

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<ul class="primary-nav">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => '',
						'items_wrap' => '%3$s'
					) ); ?>
				</ul>
			</nav>

		</div>

		<div id="content" class="site-content">

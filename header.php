<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Real World of Math
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rwom' ); ?></a>

<header class="site-header" role="banner">
  <div class="site-header__branding">
    <h1 class="site-header__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
      </a>
    </h1>
  </div>

  <nav class="site-header__navigation" role="navigation">
    <button class="menu-toggle" aria-controls="primary-menu"
            aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'rwom' ); ?></button>
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  </nav>

</header>

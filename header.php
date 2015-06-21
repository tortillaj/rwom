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
  <div class="site-header__bar">
    <div class="site-header__inner-wrapper">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Home" rel="home" class="site-header__logo">
        <?php bloginfo( 'name' ); ?>
      </a>
      <a id="toggleMenu" class="site-header__toggle toggle-menu-processed">
        <span class="site-header__hamburger"></span>
      </a>
    </div>
  </div>
  <div class="site-header__navigation">
    <nav class="site-navigation main-menu" aria-labelledby="mainMenuLabel" tabindex="-1" role="navigation">
      <h3 class="u-hidden" id="mainMenuLabel">Main Navigation Menu:</h3>
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav>
  </div>
</header>

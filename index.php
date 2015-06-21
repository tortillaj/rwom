<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Real World of Math
 */

get_header(); ?>

<main class="site-main" role="main">

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php include( locate_template( 'templates/content/excerpt.php' ) ); ?>

    <?php endwhile; ?>

  <?php else : ?>

    <?php include( locate_template( 'templates/content/none.php' ) ); ?>

  <?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Real World of Math
 */

$custom_fields = get_fields();

get_header(); ?>

<main class="site-main" role="main">

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php include( locate_template( 'templates/content/content.php' ) ); ?>

    <?php endwhile; ?>

  <?php else : ?>

    <?php include( locate_template( 'templates/content/none.php' ) ); ?>

  <?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>

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

$custom_fields = get_fields();

get_header(); ?>

<main class="site-main home" role="main">
  <header class="site-main__header">
    <div class="site-main__header-inner">
    </div>
  </header>

  <div class="site-main__inner">
    <h1 class="page-header__title"><?php the_title() ?></h1>
    <section class="page-header__text"><?php echo $custom_fields['header_text']; ?></section>

    <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <?php include(locate_template( 'templates/content/content.php' )); ?>

      <?php endwhile; ?>

    <?php else : ?>

      <?php include(locate_template( 'templates/content/none.php' )); ?>

    <?php endif; ?>
  </div>
</main><!-- #main -->

<?php get_footer(); ?>
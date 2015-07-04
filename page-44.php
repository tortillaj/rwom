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

<main class="site-main" role="main">

  <?php include( locate_template( 'templates/header/page.php' ) ); ?>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php $modules = rwom_get_modules(); ?>

        <?php if (!empty($modules)): ?>
      <div class="module-carousel slide-container">
        <div id="carousel" class="module-carousel__slides">
          <?php foreach ($modules as $module): ?>
          <div class="slide module-carousel__slide">
            <a class="module-carousel__link">
            <?php echo $module['image']; ?>
            <span class="module-carousel__title"><?php echo $module['title']; ?></span>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
        <?php endif; ?>

    <?php endwhile; ?>

  <?php else : ?>

    <?php include( locate_template( 'templates/content/none.php' ) ); ?>

  <?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>

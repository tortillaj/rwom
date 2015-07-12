<?php
/**
 * The template for displaying all single posts.
 *
 * @package Real World of Math
 */


$custom_fields = get_fields();

get_header(); ?>

<main class="site-main" role="main">

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php include( locate_template( 'templates/header/module.php' ) ); ?>

      <?php include( locate_template( 'templates/content/content.php' ) ); ?>

      <div class="contact-form">
        <h2 class="contact-form__title">Find out More!</h2>
        <div class="contact-form__form">
          <?php echo $custom_fields['contact_form']; ?>
        </div>
      </div>

    <?php endwhile; ?>

  <?php else : ?>

    <?php include( locate_template( 'templates/content/none.php' ) ); ?>

  <?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>

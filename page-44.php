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

	<div class="site-main__inner">
		<h1 class="page-header__title"><?php the_title() ?></h1>
		<section class="page-header__text"><?php echo $custom_fields['header_text']; ?></section>

		<?php if ( have_posts() ) : ?>

      <?php echo rwom_get_groupings(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $modules = rwom_get_modules(); ?>

				<?php if ( ! empty($modules) ): ?>
					<div class="module-slides">
						<?php foreach ( $modules as $module ): ?>
							<div class="module-slides__slide <?php echo $module['class']; ?>">
								<a class="module-slides__link" href="/how-it-works">
									<div class="module-slides__front">
										<span class="module-slides__overlay"></span>
										<span class="module-slides__title"><?php echo $module['title']; ?></span>
										<!-- span class="module-slides__learn-more">Learn More &raquo;</span -->
                    <?php if (!empty($module['icon'])): ?>
                      <?php //echo $module['icon']; ?>
                    <?php endif; ?>
									</div>
									<div class="module-slides__back">
										<?php if (is_array($module['feature']) && count($module['feature']) > 0): ?>
										<span class="module-slides__feature"><?php echo implode($module['feature'], ' &bull; '); ?></span>
										<?php endif; ?>
									</div>
								</a>
							</div>
              <?php //echo $module['image']; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>



			<?php endwhile; ?>

		<?php else : ?>

			<?php include(locate_template( 'templates/content/none.php' )); ?>

		<?php endif; ?>
	</div>
</main><!-- #main -->
<span class="background-image"></span>
<?php get_footer(); ?>

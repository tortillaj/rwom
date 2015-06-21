<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Real World of Math
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<article id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</article><!-- #secondary -->

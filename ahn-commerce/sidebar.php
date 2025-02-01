<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AhnCommerce
 */

if ( ! is_active_sidebar( 'ahncommerce-blog-sidebar' ) ) {
	return;
}
?>

<div class="blog__sidebar">
	<?php dynamic_sidebar( 'ahncommerce-blog-sidebar' ); ?>
</div><!-- #secondary -->

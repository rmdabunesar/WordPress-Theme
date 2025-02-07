<?php
/**
 * The sidebar containing the main widget area for blog pages
 *
 * Displays widgets that are added to the 'ahncommerce-blog-sidebar' area.
 *
 * @package AhnCommerce
 */

if ( ! is_active_sidebar( 'ahncommerce-blog-sidebar' ) ) {
    return;
}
?>

<div class="blog__sidebar" role="complementary">
    <?php dynamic_sidebar( 'ahncommerce-blog-sidebar' ); ?>
</div>

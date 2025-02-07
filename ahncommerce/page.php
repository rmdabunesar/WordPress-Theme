<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 *
 * @package AhnCommerce
 */

get_header();
?>

<?php
while ( have_posts() ) : the_post();

    // Include the page content template.
    get_template_part( 'template-parts/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile;
    
?>

<?php get_footer(); ?>

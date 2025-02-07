<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and 
 * one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package AhnCommerce
 */

get_header();
?>

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar Section -->
            <div class="col-lg-4 col-md-5">
                <?php get_sidebar(); ?>
            </div>

            <!-- Blog Posts Section -->
            <div class="col-lg-8 col-md-7">
                <div class="row">

                    <?php
                    // Check if there are posts
                    if ( have_posts() ) :

                        // Start the Loop
                        while ( have_posts() ) : the_post();

                            /*
                            * Include the Post-Type-specific template for the content.
                            */
                            get_template_part( 'template-parts/content', get_post_type() );

                            
                        endwhile;
                        ?>
					
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <?php 
                                    echo paginate_links( array(
                                    'total'   => $wp_query->max_num_pages,
                                    'current' => max( 1, get_query_var( 'paged' ) ),
                                    'format'  => '?paged=%#%',
                                    'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                                    'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                                ) ); 
                                ?>
                            </div>
                        </div>

                    <?php
                    else :
                        // If no posts, display a message
                        echo '<p>' . esc_html__( 'Sorry, no posts matched your criteria.', 'ahncommerce' ) . '</p>';
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php get_footer(); ?>

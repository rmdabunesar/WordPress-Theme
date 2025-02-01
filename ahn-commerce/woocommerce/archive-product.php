<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @package AHN Store
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-5">
                <?php 
                    if ( is_active_sidebar( 'ahncommerce-shop-sidebar' ) ) {
                        dynamic_sidebar( 'ahncommerce-shop-sidebar' );
                    } 
                ?>
            </div>
            
            <!-- Products loop -->
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                        
                            <!-- Product Section Begin -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <?php
                                    $product_id   = get_the_ID();
									$product_cat  = get_the_terms( $product_id, 'product_cat' );
                                    $product      = wc_get_product( $product_id );
                                    $product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'full' );
                                    $product_link = get_permalink( $product_id );
                                    ?>
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo esc_url( $product_image[0] ); ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li>
                                                <?php
                                                // Add to Cart button
                                                echo apply_filters( 
                                                    'woocommerce_loop_add_to_cart_link', 
                                                    sprintf( 
                                                        '<a href="%s" data-quantity="1" class="product_type_%s ajax_add_to_cart" aria-label="%s" data-product_id="%d" data-product_sku="%s"><i class="fa fa-shopping-cart"></i></a>', 
                                                        esc_url( $product->add_to_cart_url() ), 
                                                        esc_attr( $product->get_type() ), 
                                                        esc_attr( $product->get_name() ),
                                                        esc_attr( $product_id ),
                                                        esc_attr( $product->get_sku() )
                                                    ), 
                                                    $product 
                                                ); 
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">										
                                        <h6><a href="<?php echo esc_url( $product_link ); ?>"><?php the_title(); ?></a></h6>
                                        <h5><?php echo wp_kses_post( $product->get_price_html() ); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Section End -->

                        <?php endwhile; ?>
                    <?php else : ?>
                        <p><?php esc_html_e( 'No products found', 'woocommerce' ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="product__pagination">
                    <?php
                    // Display WooCommerce pagination
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
        </div>
    </div>
</section>
<!-- Product Section End -->

<?php 
get_footer(); 

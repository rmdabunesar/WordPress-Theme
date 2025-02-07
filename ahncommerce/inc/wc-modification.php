<?php
/**
 * Template Overrides for WooCommerce pages
 *
 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-3
 *
 * @package AhnCommerce
 */

/**
 * WooCommerce Shop Page Modification
*/
function ahncommerce_wc_modify_shop() {
    if (is_shop() && function_exists('WC')) {
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        add_action('woocommerce_before_main_content', 'ahncommerce_output_content_wrapper', 10);

        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        add_action('woocommerce_before_main_content', 'ahncommerce_shop_sidebar');

        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
        remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);
        remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
        remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

        add_action( 'woocommerce_before_shop_loop', 'ahncommerce_before_shop_loop', 40);

        remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
        add_action('woocommerce_after_shop_loop', 'ahncommerce_pagination', 10);
        

        add_action( 'woocommerce_after_shop_loop', 'ahncommerce_after_shop_loop', 20);

        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        add_action('woocommerce_after_main_content', 'ahncommerce_output_content_wrapper_end', 10);
    }
}
add_action('wp', 'ahncommerce_wc_modify_shop');

/**
 * WooCommerce Single Product Page Modification
*/
function ahncommerce_wc_modify_single_product() {
    if (is_singular('product') && function_exists('WC')) {
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        add_action('woocommerce_before_main_content', 'ahncommerce_output_content_wrapper', 10);

        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        add_action('woocommerce_single_product_summary', 'ahncommerce_template_single_meta', 40);

        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        add_action('woocommerce_after_main_content', 'ahncommerce_output_content_wrapper_end', 10);
    }
}
add_action('wp', 'ahncommerce_wc_modify_single_product');


function ahncommerce_output_content_wrapper() {
    echo    '<section class="product spad">
                <div class="container">
                    <div class="row">';
}

function ahncommerce_output_content_wrapper_end() {
    echo            '</div>
                </div>
            </section>';
}

function ahncommerce_shop_sidebar() {
    echo    '<div class="col-lg-3 col-md-5"> ';
                if ( is_active_sidebar( 'ahncommerce-shop-sidebar' ) ) {
                    dynamic_sidebar( 'ahncommerce-shop-sidebar' );
                }          
    echo    '</div>';
}

function ahncommerce_before_shop_loop() {
    echo    '<div class="col-lg-9 col-md-7">
                <div class="row">';
}

function ahncommerce_after_shop_loop() {
    echo        '</div>
            </div>';
}

function ahncommerce_pagination() {
    global $wp_query;
    echo    '<div class="product__pagination">';
                echo paginate_links( array(
                    'total'   => $wp_query->max_num_pages,
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'format'  => '?paged=%#%',
                    'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                    'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                ) );                 
    echo    '</div>';
}

function ahncommerce_template_single_meta() {
    global $product;
    ?>

    <div class="product__details__text">
        <ul>
            <li><b>Availability</b> <span><?php echo $product->is_in_stock() ? esc_html__( 'In Stock', 'ahncommerce' ) : esc_html__( 'Out of Stock', 'ahncommerce' ); ?></span></li>

            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>

            <li><b>Weight</b> <span><?php echo $product->get_weight() ? esc_html( $product->get_weight() . ' kg' ) : esc_html__( 'N/A', 'ahncommerce' ); ?></span></li>

            <li><b>Share on</b>
                <div class="share">
                    <!-- Share buttons -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url( get_permalink() ); ?>&text=<?php echo esc_url( get_the_title() ); ?>" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <!-- Removed Google+ as it is no longer active -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>&title=<?php echo esc_url( get_the_title() ); ?>" target="_blank">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    
    <?php
}

function ahncommerce_output_product_data_tabs() { 
    global $product;
    ?>

    <div class="col-lg-12">
        <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tabs-1" role="tab" aria-selected="true"><?php esc_html_e( 'Description', 'ahncommerce' ); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tabs-2" role="tab" aria-selected="false"><?php esc_html_e( 'Information', 'ahncommerce' ); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">
                        <?php esc_html_e( 'Reviews', 'ahncommerce' ); ?> 
                        <span>(<?php echo esc_html( $product->get_review_count() ?: '0' ); ?>)</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h6><?php esc_html_e( 'Product Description', 'ahncommerce' ); ?></h6>
                        <p><?php echo wp_kses_post( $product->get_description() ); ?></p>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h6><?php esc_html_e( 'Product Information', 'ahncommerce' ); ?></h6>
                        <ul>
                            <li><b><?php esc_html_e( 'SKU:', 'ahncommerce' ); ?></b> 
                                <?php echo $product->get_sku() ? esc_html( $product->get_sku() ) : esc_html__( 'N/A', 'ahncommerce' ); ?>
                            </li>
                            <li><b><?php esc_html_e( 'Category:', 'ahncommerce' ); ?></b> 
                                <?php echo wp_kses_post( wc_get_product_category_list( $product->get_id() ) ); ?>
                            </li>
                            <li><b><?php esc_html_e( 'Weight:', 'ahncommerce' ); ?></b> 
                                <?php echo $product->get_weight() ? esc_html( $product->get_weight() . ' kg' ) : esc_html__( 'N/A', 'ahncommerce' ); ?>
                            </li>
                            <li><b><?php esc_html_e( 'Dimensions:', 'ahncommerce' ); ?></b> 
                                <?php echo $product->get_dimensions() ? esc_html( $product->get_dimensions() ) : esc_html__( 'N/A', 'ahncommerce' ); ?>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
		</div>
    </div>

    <?php
}


<?php
/**
 * Template Name: Home Page
 *
 * @package AhnCommerce
 */

get_header(); ?>

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <?php
            // Fetch WooCommerce product categories
            $categories = get_terms( [
                'taxonomy'   => 'product_cat',
                'hide_empty' => true, // Show only categories with products
            ] );

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
                <div class="categories__slider owl-carousel">
                    <?php foreach ( $categories as $category ) :
                        // Get the category thumbnail ID and URL
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                        $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();
                    ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="<?php echo esc_url( $image_url ); ?>">
                                <h5>
                                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                                        <?php echo esc_html( $category->name ); ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <?php
                    $categories = get_terms( [
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                    ] );

                    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
                        <ul id="category-filter">
                            <li class="active" data-filter="*">All</li>
                            <?php foreach ( $categories as $category ) : ?>
                                <li data-filter=".<?php echo esc_attr( $category->slug ); ?>">
                                    <?php echo esc_html( $category->name ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row featured__filter" id="featured-products">
            <?php
            $products = new WP_Query( array(
                'post_type'      => 'product',
                'posts_per_page' => 4,
            ) );

            if ( $products->have_posts() ) :
                while ( $products->have_posts() ) : $products->the_post();
                    $product_id      = get_the_ID();
                    $product         = wc_get_product( $product_id );
                    $product_image   = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'full' );
                    $product_link    = get_permalink( $product_id );
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo esc_attr( implode( ' ', wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'slugs' ) ) ) ); ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="<?php echo esc_url( $product_image[0] ); ?>">
                                <ul class="featured__item__pic__hover">
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
                            <div class="featured__item__text">
                                <h6><a href="<?php echo esc_url( $product_link ); ?>"><?php the_title(); ?></a></h6>
                                <h5><?php echo wp_kses_post( $product->get_price_html() ); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/banner/banner-1.jpg'; ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/banner/banner-2.jpg'; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $posts = new WP_Query( array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
            ) );

            if ( $posts->have_posts() ) :
                while ( $posts->have_posts() ) : $posts->the_post();
            ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="<?php the_post_thumbnail_url() ?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?php echo esc_html( get_the_date() ); ?> </li>
                                    <li><i class="fa fa-comment-o"></i> <?php echo esc_html( get_comments_number() ) ?> </li>
                                </ul>
                                <h5><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h5>
                                <p> <?php has_excerpt() ? the_excerpt() : the_excerpt(); ?> </p>
                                <a href="<?php the_permalink() ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php get_footer(); ?>

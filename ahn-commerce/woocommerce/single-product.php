<?php
/**
 * The Template for displaying all single products
 *
 * @package	AHN Store
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Product Details Section Begin -->
	<section class="product-details spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product__details__pic">
						<div class="product__details__pic__item">
							<?php
							$image_id = $product->get_image_id();
							$image_url = wp_get_attachment_url( $image_id );
							?>
							<img class="product__details__pic__item--large" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
						</div>
						<div class="product__details__pic__slider owl-carousel">
							<?php
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								foreach ( $attachment_ids as $attachment_id ) {
									$thumb_url = wp_get_attachment_url( $attachment_id );
									$full_image_url = wp_get_attachment_image_url( $attachment_id, 'full' );
									?>
									<img data-imgbigurl="<?php echo esc_url( $full_image_url ); ?>" src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
									<?php
								}
							} else {
								echo '<img src="' . esc_url( $image_url ) . '" alt="No images available">';
							}
							?>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="product__details__text">
						<h3><?php echo esc_html( get_the_title() ); ?></h3>

						<div class="product__details__price"><?php echo $product->get_price_html(); ?></div>

						<p><?php echo wp_kses_post( $product->get_short_description() ); ?></p>

						<?php woocommerce_template_single_add_to_cart(); ?>

						<ul>
							<li><b>Availability</b> <span><?php echo $product->is_in_stock() ? esc_html__( 'In Stock' ) : esc_html__( 'Out of Stock' ); ?></span></li>

							<li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>

							<li><b>Weight</b> <span><?php echo $product->get_weight() ? esc_html( $product->get_weight() . ' kg' ) : esc_html__( 'N/A' ); ?></span></li>

							<li><b>Share on</b>
								<div class="share">
									<!-- Share buttons -->
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="https://twitter.com/intent/tweet?url=<?php echo esc_url( get_permalink() ); ?>&text=<?php echo esc_url( get_the_title() ); ?>" target="_blank">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank">
										<i class="fa fa-google-plus"></i>
									</a>
									<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>&title=<?php echo esc_url( get_the_title() ); ?>" target="_blank">
										<i class="fa fa-linkedin"></i>
									</a>
								</div>
							</li>
							<li>
								<div class="product__details__rating">
									<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
									<span>(<?php echo esc_html( $product->get_review_count() ); ?> reviews)</span>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="product__details__tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(<?php echo esc_html( $product->get_review_count() ); ?>)</span></a>
							</li>
						</ul>

						<div class="tab-content">
							<!-- Description Tab -->
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								<div class="product__details__tab__desc">
									<h6>Product Description</h6>
									<p><?php echo wp_kses_post( $product->get_description() ); ?></p>
								</div>
							</div>

							<!-- Additional Information Tab -->
							<div class="tab-pane" id="tabs-2" role="tabpanel">
								<div class="product__details__tab__desc">
									<h6>Product Information</h6>
									<ul>
										<li><b>SKU:</b> <?php echo $product->get_sku() ? esc_html( $product->get_sku() ) : esc_html__( 'N/A' ); ?></li>
										<li><b>Category:</b> <?php echo wc_get_product_category_list( $product->get_id() ); ?></li>
										<li><b>Weight:</b> <?php echo $product->get_weight() ? esc_html( $product->get_weight() . ' kg' ) : esc_html__( 'N/A' ); ?></li>
										<li><b>Dimensions:</b> <?php echo $product->get_dimensions() ? esc_html( $product->get_dimensions() ) : esc_html__( 'N/A' ); ?></li>
									</ul>
								</div>
							</div>

							<!-- Reviews Tab -->
							<div class="tab-pane" id="tabs-3" role="tabpanel">
								<div class="product__details__tab__desc">
									<h6>Product Reviews</h6>
									<?php
									// Display the reviews
									comments_template();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Details Section End -->

<?php endwhile; ?>

<?php
get_footer();

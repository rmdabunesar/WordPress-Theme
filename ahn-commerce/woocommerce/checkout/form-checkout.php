<?php
/**
 * Checkout Form
 *
 * @package AhnCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php if ( wc_coupons_enabled() ) : ?>
                <?php echo woocommerce_checkout_coupon_form(); ?>
            <?php endif; ?>
            </div>
        </div>
        <div class="checkout__form">
            <h4><?php esc_html_e( 'Billing Details', 'ahn-store' ); ?></h4>
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <!-- First Name and Last Name -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p><?php esc_html_e( 'First Name', 'ahn-store' ); ?><span>*</span></p>
                                    <input type="text" name="billing_first_name" id="billing_first_name" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_first_name' ) ); ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p><?php esc_html_e( 'Last Name', 'ahn-store' ); ?><span>*</span></p>
                                    <input type="text" name="billing_last_name" id="billing_last_name" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_last_name' ) ); ?>" required>
                                </div>
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="checkout__input">
                            <p><?php esc_html_e( 'Country', 'ahn-store' ); ?><span>*</span></p>
                            <input type="text" name="billing_country" id="billing_country" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_country' ) ); ?>" required>
                        </div>

                        <!-- Address -->
                        <div class="checkout__input">
                            <p><?php esc_html_e( 'Address', 'ahn-store' ); ?><span>*</span></p>
                            <input type="text" name="billing_address_1" id="billing_address_1" placeholder="<?php esc_attr_e( 'Street Address', 'ahn-store' ); ?>" class="checkout__input__add" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_address_1' ) ); ?>" required>
                            <input type="text" name="billing_address_2" id="billing_address_2" placeholder="<?php esc_attr_e( 'Apartment, suite, unit, etc. (optional)', 'ahn-store' ); ?>" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_address_2' ) ); ?>">
                        </div>

                        <!-- City -->
                        <div class="checkout__input">
                            <p><?php esc_html_e( 'Town/City', 'ahn-store' ); ?><span>*</span></p>
                            <input type="text" name="billing_city" id="billing_city" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_city' ) ); ?>" required>
                        </div>

                        <!-- State -->
                        <div class="checkout__input">
                            <p><?php esc_html_e( 'Country/State', 'ahn-store' ); ?><span>*</span></p>
                            <input type="text" name="billing_state" id="billing_state" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_state' ) ); ?>" required>
                        </div>

                        <!-- Postcode -->
                        <div class="checkout__input">
                            <p><?php esc_html_e( 'Postcode / ZIP', 'ahn-store' ); ?><span>*</span></p>
                            <input type="text" name="billing_postcode" id="billing_postcode" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_postcode' ) ); ?>" required>
                        </div>

                        <!-- Phone -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p><?php esc_html_e( 'Phone', 'ahn-store' ); ?><span>*</span></p>
                                    <input type="tel" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_phone' ) ); ?>" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p><?php esc_html_e( 'Email', 'ahn-store' ); ?><span>*</span></p>
                                    <input type="email" name="billing_email" id="billing_email" value="<?php echo esc_attr( WC()->checkout->get_value( 'billing_email' ) ); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4><?php esc_html_e( 'Your Order', 'ahn-store' ); ?></h4>
                            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                            <button type="submit" class="site-btn" name="woocommerce_checkout_place_order" id="place_order"><?php esc_html_e( 'PLACE ORDER', 'ahn-store' ); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php
/**
 * The template for displaying the footer section.
 * Contains the closing of the #content div and all content after.
 *
 * @package AhnCommerce
 */

?>

	<!-- Footer Section Begin -->
	<footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <?php 
                    if ( is_active_sidebar( 'ahncommerce-footer-widget-1' ) ) {
                        dynamic_sidebar( 'ahncommerce-footer-widget-1' );
                    }
                    ?>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <?php 
                    if ( is_active_sidebar( 'ahncommerce-footer-widget-2' ) ) {
                        dynamic_sidebar( 'ahncommerce-footer-widget-2' );
                    }
                    ?>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3"> 
                    <?php 
                    if ( is_active_sidebar( 'ahncommerce-footer-widget-3' ) ) {
                        dynamic_sidebar( 'ahncommerce-footer-widget-3' );
                    }
                    ?>
                </div>
                <div class="col-lg-4 col-md-12">
                    <?php 
                    if ( is_active_sidebar( 'ahncommerce-footer-widget-4' ) ) {
                        dynamic_sidebar( 'ahncommerce-footer-widget-4' );
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p> <?php echo esc_html( Redux::get_option( 'ahncommerce', 'footer_copyright' ) ); ?> </p>
                        </div>
                        <div class="footer__copyright__payment">
                            <?php
                                $payment_img = Redux::get_option( 'ahncommerce', 'footer_payment' );
                                if ( ! empty( $payment_img['url'] ) ) {
                                    echo '<img src="' . esc_url( $payment_img['url'] ) . '" alt="Payment Methods">';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

	<?php wp_footer(); ?>
</body>

</html>

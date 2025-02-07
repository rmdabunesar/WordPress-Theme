<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package AhnCommerce
 */

get_header();
?>

<section class="404">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-content-404">
                    <h1><?php esc_html_e( 'Page not found', 'ahncommerce' ); ?></h1>
                    <p><?php esc_html_e( 'Unfortunately, the page you tried to reach does not exist on this site!', 'ahncommerce' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="primary-btn"><?php esc_html_e( 'Go to Home Page', 'ahncommerce' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

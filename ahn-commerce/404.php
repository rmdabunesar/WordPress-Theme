<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AhnCommerce
 */

get_header();
?>

<section class="404">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div style="text-align: center; margin: 50px 0 100px">
                    <h1><?php esc_html_e( 'Page not found', 'fancy-lab' ); ?></h1>
                    <p><?php esc_html_e( 'Unfortunately, the page you tried to reach does not exist on this site!', 'fancy-lab' ); ?></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="primary-btn">Go to Home Page</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

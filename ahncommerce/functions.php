<?php
/**
 * AhnCommerce functions and definitions
 *
 * @package AhnCommerce
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * This includes support for post thumbnails, menus, automatic feed links, etc.
 *
 * @return void
 */
function ahncommerce_setup()
{
    // Make theme available for translation
    load_theme_textdomain('ahncommerce', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 85,
        'width'       => 160,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'ahncommerce-header-menu' => esc_html__('Header', 'ahncommerce'),
            'ahncommerce-categories'  => esc_html__('Categories', 'ahncommerce'),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Adds theme support for post formats
    add_theme_support( 'post-formats', 
        array( 
            'aside', 
            'audio', 
            'chat', 
            'gallery', 
            'image', 
            'link', 
            'quote', 
            'status', 
            'video' 
        ) 
    );

    // Add WooCommerce support.
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));

    // Enable zoom
    add_theme_support('wc-product-gallery-zoom'); 
    // Enable lightbox
    add_theme_support('wc-product-gallery-lightbox'); 
    // Enable slider
    add_theme_support('wc-product-gallery-slider'); 

    // restore the classic widget editor
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'ahncommerce_setup');

/**
 * Register widget areas.
 */
function ahncommerce_widgets_init()
{
    // Register custom widgets
    register_widget('AhnCommerce_Widget_Search');
    register_widget('AhnCommerce_Widget_Post_Categories');
    register_widget('AhnCommerce_Widget_Recent_Posts');
    register_widget('AhnCommerce_Widget_Post_Tags');
    register_widget('AhnCommerce_Widget_Newsletter');
    register_widget('AhnCommerce_Widget_About_Us');

    // Register Blog Sidebar
    register_sidebar(
        array(
            'name'          => esc_html__('Blog Sidebar', 'ahncommerce'),
            'id'            => 'ahncommerce-blog-sidebar',
            'description'   => esc_html__('Add widgets here.', 'ahncommerce'),
            'before_widget' => '<div class="blog__sidebar__item">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );

    // Register Shop Sidebar
    register_sidebar(
        array(
            'name'          => esc_html__('Shop Sidebar', 'ahncommerce'),
            'id'            => 'ahncommerce-shop-sidebar',
            'before_widget' => '<div class="sidebar__item">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );

    // Register Footer Widget Areas
    $footer_areas = array(
        'ahncommerce-footer-widget-1' => esc_html__('Footer Area 1', 'ahncommerce'),
        'ahncommerce-footer-widget-2' => esc_html__('Footer Area 2', 'ahncommerce'),
        'ahncommerce-footer-widget-3' => esc_html__('Footer Area 3', 'ahncommerce'),
        'ahncommerce-footer-widget-4' => esc_html__('Footer Area 4', 'ahncommerce'),
    );

    foreach ($footer_areas as $id => $name) {
        register_sidebar(
            array(
                'name'          => $name,
                'id'            => $id,
                'before_widget' => '<div class="footer__widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h6>',
                'after_title'   => '</h6>',
            )
        );
    }
}
add_action('widgets_init', 'ahncommerce_widgets_init');

/**
 * Enqueue theme scripts and styles.
 */
function ahncommerce_enqueue_scripts()
{
    // Google Fonts
    wp_enqueue_style(
        'ahncommerce-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap',
        array(),
        null
    );

    // Enqueue styles
    wp_enqueue_style(
        'ahncommerce-bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/bootstrap.min.css')
    );
    wp_enqueue_style(
        'ahncommerce-font-awesome',
        get_template_directory_uri() . '/assets/css/font-awesome.min.css',
        array(),
        '4.7.0'
    );
    wp_enqueue_style(
        'ahncommerce-elegant-icons',
        get_template_directory_uri() . '/assets/css/elegant-icons.css',
        array(),
        null
    );
    wp_enqueue_style(
        'ahncommerce-nice-select',
        get_template_directory_uri() . '/assets/css/nice-select.css',
        array(),
        null
    );
    wp_enqueue_style(
        'ahncommerce-jquery-ui',
        get_template_directory_uri() . '/assets/css/jquery-ui.min.css',
        array(),
        '1.12.1'
    );
    wp_enqueue_style(
        'ahncommerce-owl-carousel',
        get_template_directory_uri() . '/assets/css/owl.carousel.min.css',
        array(),
        '2.3.4'
    );
    wp_enqueue_style(
        'ahncommerce-slicknav',
        get_template_directory_uri() . '/assets/css/slicknav.min.css',
        array(),
        '1.0.10'
    );
    wp_enqueue_style(
        'ahncommerce-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/style.css')
    );
    wp_enqueue_style(
        'ahncommerce-wc-style',
        get_template_directory_uri() . '/assets/css/wc-style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/wc-style.css')
    );
    wp_enqueue_style(
        'ahncommerce-stylesheet',
        get_stylesheet_uri(),
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Enqueue scripts
    wp_enqueue_script(
        'ahncommerce-bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        array('jquery'),
        '4.4.1',
        true
    );
    wp_enqueue_script(
        'ahncommerce-nice-select',
        get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js',
        array('jquery'),
        '1.0.0',
        true
    );
    wp_enqueue_script(
        'ahncommerce-jquery-ui',
        get_template_directory_uri() . '/assets/js/jquery-ui.min.js',
        array('jquery'),
        '1.12.1',
        true
    );
    wp_enqueue_script(
        'ahncommerce-slicknav',
        get_template_directory_uri() . '/assets/js/jquery.slicknav.js',
        array('jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'ahncommerce-mixitup',
        get_template_directory_uri() . '/assets/js/mixitup.min.js',
        array('jquery'),
        '3.3.1',
        true
    );
    wp_enqueue_script(
        'ahncommerce-owl-carousel',
        get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
        array('jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'ahncommerce-wc-script',
        get_template_directory_uri() . '/assets/js/wc-script.js',
        array('jquery'),
        null,
        true
    );

    // Enqueue scripts
    wp_enqueue_script(
        'ahncommerce-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        null,
        true
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'ahncommerce_enqueue_scripts');

/**
 * Show cart contents / total Ajax
 */
function ahncommerce_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
        <div class="header__cart">
            <ul>
                <li>
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="View Cart">
                        <i class="fa fa-shopping-bag"></i> <span> <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?> </span>
                    </a>
                </li>
            </ul>
            <div class="header__cart__price">Total: <span> <?php echo WC()->cart->get_total(); ?> </span></div>
        </div>
	<?php
	$fragments['div.header__cart'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ahncommerce_woocommerce_header_add_to_cart_fragment' );

/**
 * Load Customize Options files if they exist.
 */
if (file_exists(get_template_directory() . '/inc/customizer.php')) {
    require_once get_template_directory() . '/inc/customizer.php';
}

/**
 * Enqueue demo data import scripts.
 */
if (file_exists(get_template_directory() . '/inc/demo-data/ocdi.php')) {
    require_once get_template_directory() . '/inc/demo-data/ocdi.php';
}

/**
 * Load custom widget classes if they exist.
 */
$widget_files = array(
    'class-ahncommerce_widget_search.php',
    'class-ahncommerce-widget-post-categories.php',
    'class-ahncommerce-widget-recent-posts.php',
    'class-ahncommerce-widget-post-tags.php',
    'class-ahncommerce_widget_newsletter.php',
    'class-ahncommerce-widget-about-us.php',
);

foreach ($widget_files as $file) {
    $path = get_template_directory() . '/inc/widgets/' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}

/**
 * If WooCommerce is active, we want to enqueue a file
 * with a couple of template overrides
 */
if( class_exists( 'WooCommerce' ) ){
	require get_template_directory() . '/inc/wc-modification.php';
}
<?php
/**
 * AhnCommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AhnCommerce
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ahncommerce_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on AhnCommerce, use a find and replace
     * to change 'ahncommerce' to the name of your theme in all the template files.
     */
    load_theme_textdomain('ahncommerce', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'ahncommerce-header-menu' => esc_html__('Header', 'ahncommerce'),
            'ahncommerce-categiries'  => esc_html__('Categories', 'ahncommerce'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
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

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'ahncommerce_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    add_theme_support( 'woocommerce', array(
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
    ) );    
        
}
add_action('after_setup_theme', 'ahncommerce_setup');

/**
 * Register widget area.
 */
function ahncommerce_widgets_init() {
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
    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'ahncommerce'),
        'id'            => 'ahncommerce-shop-sidebar',
        'before_widget' => '<div class="sidebar__item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    // Register Footer Widget Area 1
    register_sidebar(array(
        'name'          => esc_html__('Footer Area 1', 'ahncommerce'),
        'id'            => 'ahncommerce-footer-widget-1',
        'before_widget' => '<div class="footer__about">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ));

    // Register Footer Widget Area 2
    register_sidebar(array(
        'name'          => esc_html__('Footer Area 2', 'ahncommerce'),
        'id'            => 'ahncommerce-footer-widget-2',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ));

    // Register Footer Widget Area 3
    register_sidebar(array(
        'name'          => esc_html__('Footer Area 3', 'ahncommerce'),
        'id'            => 'ahncommerce-footer-widget-3',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ));

    // Register Footer Widget Area 4
    register_sidebar(array(
        'name'          => esc_html__('Footer Area 4', 'ahncommerce'),
        'id'            => 'ahncommerce-footer-widget-4',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>',
    ));
}
add_action('widgets_init', 'ahncommerce_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ahncommerce_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'ahncommerce-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap',
        [],
        null
    );

    // All CSS files
    wp_enqueue_style(
        'ahncommerce-bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        [],
        '4.4.1'
    );
    wp_enqueue_style(
        'ahncommerce-font-awesome',
        get_template_directory_uri() . '/assets/css/font-awesome.min.css',
        [],
        '4.7.0'
    );
    wp_enqueue_style(
        'ahncommerce-elegant-icons',
        get_template_directory_uri() . '/assets/css/elegant-icons.css',
        [],
        null
    );
    wp_enqueue_style(
        'ahncommerce-nice-select',
        get_template_directory_uri() . '/assets/css/nice-select.css',
        [],
        null
    );
    wp_enqueue_style(
        'ahncommerce-jquery-ui',
        get_template_directory_uri() . '/assets/css/jquery-ui.min.css',
        [],
        '1.12.1'
    );
    wp_enqueue_style(
        'ahncommerce-owl-carousel',
        get_template_directory_uri() . '/assets/css/owl.carousel.min.css',
        [],
        '2.3.4'
    );
    wp_enqueue_style(
        'ahncommerce-slicknav',
        get_template_directory_uri() . '/assets/css/slicknav.min.css',
        [],
        '1.0.10'
    );
    wp_enqueue_style(
        'ahncommerce-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        '1.0.10'
    );
    wp_enqueue_style(
        'ahncommerce-stylesheet',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );

    // All JS files
    wp_enqueue_script(
        'ahncommerce-bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        ['jquery'],
        '4.4.1',
        true
    );
    wp_enqueue_script(
        'ahncommerce-nice-select',
        get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js',
        ['jquery'],
        '1.0.0',
        true
    );
    wp_enqueue_script(
        'ahncommerce-jquery-ui',
        get_template_directory_uri() . '/assets/js/jquery-ui.min.js',
        ['jquery'],
        '1.12.1',
        true
    );
    wp_enqueue_script(
        'ahncommerce-slicknav',
        get_template_directory_uri() . '/assets/js/jquery.slicknav.js',
        ['jquery'],
        null,
        true
    );
    wp_enqueue_script(
        'ahncommerce-mixitup',
        get_template_directory_uri() . '/assets/js/mixitup.min.js',
        ['jquery'],
        '3.3.1',
        true
    );
    wp_enqueue_script(
        'ahncommerce-owl-carousel',
        get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
        ['jquery'],
        null,
        true
    );
    wp_enqueue_script(
        'ahncommerce-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'ahncommerce_scripts');

/**
 * Load Redux Framework files if they exist.
 */
if (file_exists(get_template_directory() . '/inc/redux-framework/redux-framework.php')) {
    require_once get_template_directory() . '/inc/redux-framework/redux-framework.php';
}

if (file_exists(get_template_directory() . '/inc/redux-framework/sample/redux-config.php')) {
    require_once get_template_directory() . '/inc/redux-framework/sample/redux-config.php';
}

/**
 * Enqueue scripts for demo data using One Click Demo Import library.
 */
if (file_exists(get_template_directory() . '/inc/demo-data/ocdi.php')) {
    require_once get_template_directory() . '/inc/demo-data/ocdi.php';
}

/**
 * Load custom widget classes if they exist.
 */
$widget_files = [
    'class-ahncommerce_widget_search.php',
    'class-ahncommerce-widget-post-categories.php',
    'class-ahncommerce-widget-recent-posts.php',
    'class-ahncommerce-widget-post-tags.php',
    'class-ahncommerce_widget_newsletter.php',
    'class-ahncommerce-widget-about-us.php',
];

foreach ($widget_files as $file) {
    $path = get_template_directory() . '/inc/widgets/' . $file;
    if (file_exists($path)) {
        require_once $path;
    }
}

<?php

/**
 * This theme is using the One Click Demo Import Plugin (optional) for importing demo data.
 * 
 * @package AhnCommerce
 */

 function ahncommerce_import_files() {
    return [
        [
            'import_file_name'             => 'AhnCommerce 1',
            'categories'                   => ['store'],
            'local_import_file'            => 'https://github.com/rmdabunesar/WordPress-Theme/blob/main/ahn-commerce/inc/demo-data/demo-content.xml',
            'local_import_widget_file'     => 'https://github.com/rmdabunesar/WordPress-Theme/blob/main/ahn-commerce/inc/demo-data/widgets.wie',
            'local_import_customizer_file' => 'https://github.com/rmdabunesar/WordPress-Theme/blob/main/ahn-commerce/inc/demo-data/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo-data/screenshot.png',
            'import_notice'                 => __( 'This theme works best with WooCommerce installed.', 'ahncommerce' ),
        ]
    ];
}
add_filter('ocdi/import_files', 'ahncommerce_import_files');

function ahncommerce_after_import_setup() {
    // Assign menus to their locations
    $menus = [
        'ahncommerce-header-menu' => 'Main Menu',
        'ahncommerce-categiries'  => 'Categories',
    ];

    $menu_locations = [];
    foreach ($menus as $location => $name) {
        $menu = get_term_by('name', $name, 'nav_menu');
        if ($menu) {
            $menu_locations[$location] = $menu->term_id;
        }
    }
    set_theme_mod('nav_menu_locations', $menu_locations);

    // Assign front page and posts page (blog page).
    $front_page = get_page_by_title('Home');
    $blog_page = get_page_by_title('Blog');
    $privacy_policy = get_page_by_title('Privacy policy');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page->ID);
    update_option('page_for_posts', $blog_page->ID);
    update_option('wp_page_for_privacy_policy', $privacy_policy->ID);
}
add_action('ocdi/after_import', 'ahncommerce_after_import_setup');




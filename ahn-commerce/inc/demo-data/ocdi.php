<?php

/**
 * This theme is using the One Click Demo Import Plugin (optional) for importing demo data.
 */

function ahncommerce_before_import_check() {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        wp_die(
            esc_html__('WooCommerce is required to import the demo content. Please install and activate the WooCommerce plugin first.', 'ahncommerce'),
            esc_html__('Demo Import Error', 'ahncommerce'),
            ['back_link' => true]
        );
    }
}
add_action('ocdi/before_content_import', 'ahncommerce_before_import_check');

function ahncommerce_import_files() {
    $base_path = get_template_directory() . '/inc/demo-data/';
    $base_path_uri = get_template_directory_uri() . '/inc/demo-data/';
    return [
        [
            'import_file_name'             => 'AhnCommerce 1',
            'categories'                   => ['store'],
            'local_import_file'            => $base_path . 'demo-content.xml',
            'local_import_widget_file'     => $base_path . 'widgets.wie',
            'local_import_customizer_file' => $base_path . 'customizer.dat',
            'import_preview_image_url'     => $base_path_uri . 'screenshot.png',
            'local_import_redux'           => [
                [
                    'file_path'   => $base_path . 'redux.json',
                    'option_name' => 'ahncommerce',
                ],
            ]
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




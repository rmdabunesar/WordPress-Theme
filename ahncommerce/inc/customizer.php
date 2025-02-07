<?php
/**
 * AhnCommerce Theme Customizer.
 *
 * Registers the theme customizer settings.
 *
 * @package AhnCommerce
 */

function ahncommerce_customize_register($wp_customize) {
    // === Top Bar Panel ===
    $wp_customize->add_panel(
        'panel_topbar', array(
            'title'    => 'Top Bar',
            'priority' => 30,
        )
    );

        // === Top Bar Section ===
        $wp_customize->add_section(
            'sec_topbar', array(
                'title'    => 'General Settings',
                'panel'    => 'panel_topbar',
                'priority' => 10,
            )
        );

        // Field 1 - Topbar Email Box
        $wp_customize->add_setting(
            'set_topbar_email', array(
                'type'              => 'theme_mod',
                'default'           => 'info@ahnsolution.com',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'set_topbar_email', array(
                'label'       => 'Email',
                'description' => 'Add your email',
                'section'     => 'sec_topbar',
                'type'        => 'text',
            )
        );

        // Field 2 - Topbar Message Box
        $wp_customize->add_setting(
            'set_topbar_message', array(
                'type'              => 'theme_mod',
                'default'           => 'Free Shipping for all Order of $99',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'set_topbar_message', array(
                'label'       => 'Message',
                'description' => 'Add your message',
                'section'     => 'sec_topbar',
                'type'        => 'text',
            )
        );

    // === Social Media Section (Inside Topbar Panel) ===
    $wp_customize->add_section(
        'sec_social_media', array(
            'title'    => 'Social Media Links',
            'panel'    => 'panel_topbar', // Inside Top Bar Panel
            'priority' => 20,
        )
    );

        // Social Media Fields
        $social_media = array('facebook', 'twitter', 'linkedin', 'instagram');

        foreach ($social_media as $social_platform) {
            $wp_customize->add_setting(
                "set_{$social_platform}_link", array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'esc_url_raw',
                )
            );

            $wp_customize->add_control(
                "set_{$social_platform}_link", array(
                    'label'       => ucfirst($social_platform) . ' URL',
                    'description' => "Enter your {$social_platform} profile link",
                    'section'     => 'sec_social_media',
                    'type'        => 'url',
                )
            );
        }

    // === Header Panel ===
    $wp_customize->add_panel(
        'panel_header', array(
            'title'    => 'Header',
            'priority' => 40,
        )
    );

        // === Header Section ===
        $wp_customize->add_section(
            'sec_header', array(
                'title'    => 'Hotline',
                'panel'    => 'panel_header',
                'priority' => 10,
            )
        );

            // Field 1 - Header Hotline Number
            $wp_customize->add_setting(
                'set_header_hotline', array(
                    'type'              => 'theme_mod',
                    'default'           => '+880 1753214081',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_header_hotline', array(
                    'label'       => 'Hotline',
                    'description' => 'Add your hotline',
                    'section'     => 'sec_header',
                    'type'        => 'text',
                )
            );

            // Field 2 - Header Hotline Message
            $wp_customize->add_setting(
                'set_header_info', array(
                    'type'              => 'theme_mod',
                    'default'           => 'support 24/7 time',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_header_info', array(
                    'label'       => 'Hotline',
                    'description' => 'Add your info',
                    'section'     => 'sec_header',
                    'type'        => 'text',
                )
            );

    // === Hero Panel ===
     $wp_customize->add_panel(
        'panel_hero', array(
            'title'    => 'Hero',
            'priority' => 50,
        )
    );

        // === Hero Text Section ===
        $wp_customize->add_section(
            'sec_hero_text', array(
                'title'    => 'Text',
                'panel'    => 'panel_hero',
                'priority' => 10,
            )
        );

            // Field 1 - Hero Subtitle
            $wp_customize->add_setting(
                'set_hero_subtitle', array(
                    'type'              => 'theme_mod',
                    'default'           => 'FRUIT FRESH',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_hero_subtitle', array(
                    'label'       => 'Subtitle',
                    'description' => 'Add your subtitle',
                    'section'     => 'sec_hero_text',
                    'type'        => 'text',
                )
            );

            // Field 2 - Hero title
            $wp_customize->add_setting(
                'set_hero_title', array(
                    'type'              => 'theme_mod',
                    'default'           => 'Vegetable 100% Organic',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_hero_title', array(
                    'label'       => 'Title',
                    'description' => 'Add your title',
                    'section'     => 'sec_hero_text',
                    'type'        => 'text',
                )
            );

        // === Hero Button Section ===
        $wp_customize->add_section(
            'sec_hero_button', array(
                'title'    => 'Button',
                'panel'    => 'panel_hero',
                'priority' => 20,
            )
        );

            // Field 1 - Hero Button
            $wp_customize->add_setting(
                'set_hero_button_text', array(
                    'type'              => 'theme_mod',
                    'default'           => 'SHOP NOW',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text', array(
                    'label'       => 'Button Text',
                    'description' => 'Add your button text',
                    'section'     => 'sec_hero_button',
                    'type'        => 'text',
                )
            );


            // Field 2 - Hero Button URL
            $wp_customize->add_setting(
                'set_hero_button_url', array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'esc_url_raw',
                )
            );

            $wp_customize->add_control(
                'set_hero_button_url', array(
                    'label'       => 'Button URL',
                    'description' => 'Add your button link',
                    'section'     => 'sec_hero_button',
                    'type'        => 'url',
                )
            );
        
        // === Hero Image Section ===
        $wp_customize->add_section(
            'sec_hero_image', array(
                'title'    => 'Image',
                'panel'    => 'panel_hero',
                'priority' => 30,
            )
        );

            // Field 1 - Hero Button
            $wp_customize->add_setting(
                'set_hero_image', array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'absint',
                )
            );

            $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'set_hero_image', array(
                    'label'         => 'Hero Image',
                    'description'   => 'Select hero image',
                    'section'       => 'sec_hero_image',
                    'mime_type'     => 'image',
                ) )
            );

        // === Footer Botton Section ===
        $wp_customize->add_section(
            'sec_footer_bottom', array(
                'title'    => 'Footer',
                'priority' => 60,
            )
        );

            // Field 1 - Footer Bottom Copiright Text
            $wp_customize->add_setting(
                'set_footer_copiright', array(
                    'type'              => 'theme_mod',
                    'default'           => 'Copyright © 2025 | All Rights Reserved | This theme is made by AHN Solution',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );

            $wp_customize->add_control(
                'set_footer_copiright', array(
                    'label'       => 'Copyright Text',
                    'description' => 'Add your copiright text',
                    'section'     => 'sec_footer_bottom',
                    'type'        => 'textarea',
                )
            );


            // Field 2 - Footer Bottom Payment Image
            $wp_customize->add_setting(
                'set_footer_image', array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'absint',
                )
            );

            $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'set_footer_image', array(
                    'label'         => 'Payment Method',
                    'description'   => 'Select payment method image', 'ahncommerce',
                    'section'       => 'sec_footer_bottom',
                    'mime_type'     => 'image',
                ) )
            );
}
add_action('customize_register', 'ahncommerce_customize_register');

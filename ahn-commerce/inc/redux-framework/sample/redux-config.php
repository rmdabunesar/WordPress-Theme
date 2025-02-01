<?php
/**
 * Redux Config File for Theme Option
 *
 * @package AhnCommerce
 */

if ( !class_exists('Redux') ) {
    return;
}

$opt_name = 'ahncommerce';

$args = 

Redux::set_args( $opt_name, array(
    'opt_name'        => $opt_name,
    'display_name'    => 'AhnCommerce',
    'display_version' => '1.0.0',
    'menu_title'      => 'Theme Options',
    'page_title'      => 'Theme Options',
    'menu_type'       => 'menu',
    'allow_sub_menu'  => true,
    'menu_icon'       => 'dashicons-admin-generic',
    'page_priority'   => 61,
    'page_slug'       => 'theme-options',
    'customizer'      => true,
    'dev_mode'        => false,
    'footer_credit'   => ' ',
) );

// Top Bar sections and fields.
Redux::set_section($opt_name, array(
    'title'  => 'Top Bar',
    'id'     => 'topbar',
    'desc'   => '',
    'icon'   => '',
    'fields' => array(
        array(
            'id'       => 'topbar_email',
            'type'     => 'text',
            'title'    => esc_html__('Email Address', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your email address', 'ahncommerce'),
            'desc'     => '',
            'default'  => 'info@ahnsolution.com',
        ),
        array(
            'id'       => 'topbar_message',
            'type'     => 'text',
            'title'    => esc_html__('Message', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your custom message', 'ahncommerce'),
            'desc'     => '',
            'default'  => 'Free Shipping for all Order of $99',
        ),
    ),
));

// Social media sub-sections and fields.
Redux::set_section($opt_name, array(
    'title'      => esc_html__('Social Media', 'ahncommerce'),
    'id'         => 'social',
    'subsection' => true,
    'icon'       => '',
    'fields'     => array(
        array(
            'id'              => 'social_profiles',
            'type'            => 'social_profiles',
            'title'           => esc_html__('Social Profiles', 'ahncommerce'),
            'subtitle'        => esc_html__('Click an icon to add social media', 'ahncommerce'),
            'hide_widget_msg' => true,
            'include'         => array('facebook', 'twitter', 'linkedin', 'instagram')
        ),
    ),
));

// Header sections and fields.
Redux::set_section($opt_name, array(
    'title'  => 'Header',
    'id'     => 'header',
    'icon'   => '',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo', 'ahncommerce'),
            'subtitle' => esc_html__('Add your website logo', 'ahncommerce'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/assets/img/logo.png',
            ),
        ),
        array(
            'id'       => 'hotline',
            'type'     => 'text',
            'title'    => esc_html__('Hotline', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your phone number', 'ahncommerce'),
            'desc'     => '',
        ),
        array(
            'id'       => 'switch_hotline',
            'type'     => 'switch',
            'title'    => esc_html__('Hotline', 'ahncommerce'),
            'subtitle' => esc_html__('Insert hotline number', 'ahncommerce'),
            'default'  => true,
            'on'       => 'Show',
            'off'      => 'Hide',
        ),
        array(
            'id'       => 'hotline',
            'type'     => 'text',
            'required' => array('switch_hotline', '=', true),
            'desc'     => esc_html__('', 'ahncommerce'),
            'default'  => '+880 1753214081',
        ),
    ),
));

// Hero sections and fields.
Redux::set_section($opt_name, array(
    'title'  => 'Hero',
    'id'     => 'hero',
    'icon'   => '',
    'fields' => array(
        array(
            'id'       => 'hero-subtitle',
            'type'     => 'text',
            'title'    => esc_html__('Subtitle', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your subtitle', 'ahncommerce'),
            'desc'     => '',
            'default'  => 'FRUIT FRESH',
        ),
        array(
            'id'       => 'hero-title',
            'type'     => 'text',
            'title'    => esc_html__('Title', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your title', 'ahncommerce'),
            'desc'     => '',
            'default'  => 'Vegetable 100% Organic',
        ),
        array(
            'id'       => 'hero-url',
            'type'     => 'text',
            'title'    => esc_html__('Button Link', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your button link', 'ahncommerce'),
            'desc'     => '',
            'default'  => '/shop',
        ),
        array(
            'id'       => 'hero-image',
            'type'     => 'media',
            'title'    => esc_html__('Hero Image', 'ahncommerce'),
            'subtitle' => esc_html__('Add your hero image', 'ahncommerce'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/assets/img/hero/banner.jpg',
            ),
        ),
    ),
));

// Footer sections and fields.
Redux::set_section($opt_name, array(
    'title'  => 'Footer Bottom',
    'id'     => 'footer',
    'desc'   => '',
    'icon'   => '',
    'fields' => array(
        array(
            'id'       => 'footer_copyright',
            'type'     => 'textarea',
            'title'    => esc_html__('Copyright Text', 'ahncommerce'),
            'subtitle' => esc_html__('Insert your copyright text', 'ahncommerce'),
            'desc'     => '',
            'default'  => 'Copyright © 2025 | All Rights Reserved | This theme is made by AHN Solution',
        ),
        array(
            'id'       => 'footer_payment',
            'type'     => 'media',
            'title'    => esc_html__('Payment', 'ahncommerce'),
            'subtitle' => esc_html__('Add your website payment items', 'ahncommerce'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/assets/img/payment-item.png',
            ),
        ),
    ),
));
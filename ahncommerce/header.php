<?php
/**
 * The header for the theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package AhnCommerce
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <?php 
            if( has_custom_logo() ) :
                the_custom_logo();
            else :
            ?>
                <h2><a href="<?php echo esc_url( home_url('/') );?>"> <?php bloginfo( 'title' ); ?> </a></h2>
            <?php endif; ?>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'ahncommerce-header-menu',
                'depth'           => 2,
                'menu_class'      => '',
                'sub_menu_class'  => '',
            ) );
            ?>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
        <span>.</span>
        <?php
            $social_media = [ 'facebook', 'twitter', 'linkedin', 'instagram' ];
            foreach ( $social_media as $social_platform ) :

                $social_url = get_theme_mod( "set_{$social_platform}_link", '' );
                if ( ! empty( $social_url ) ) : ?>
                    <a href="<?php echo esc_url( $social_url ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $social_platform ) ?>"></i></a>
                <?php endif; 
                
            endforeach;
        ?>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-phone"></i> <?php echo esc_html( get_theme_mod( 'set_header_hotline', __('+880 1753214081', 'ahncommerce') ) ); ?> </li>
                <li><i class="fa fa-envelope"></i> <?php echo esc_html( get_theme_mod( 'set_topbar_email', 'info@ahnsolution.com' ) ); ?> </li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <?php
                if ( is_user_logged_in() ) {
                    echo '<a href="' . esc_url( wp_logout_url() ) . '" aria-label="Logout"><i class="fa fa-sign-out"></i> Logout</a>';
                } else {
                    echo '<a href="' . esc_url( wp_login_url() ) . '" aria-label="Login"><i class="fa fa-sign-in"></i> Login</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope-o"></i> <?php echo esc_html( get_theme_mod( 'set_topbar_email', 'info@ahnsolution.com' ) ); ?> </li>
                                <li><i class="fa fa-bell-o"></i> <?php echo esc_html( get_theme_mod( 'set_topbar_message', __('Free Shipping for all Order of $99', 'ahncommerce') ) ); ?> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <span>.</span>
                                <?php
                                    $social_media = [ 'facebook', 'twitter', 'linkedin', 'instagram' ];
                                    foreach ( $social_media as $social_platform ) :

                                        $social_url = get_theme_mod( "set_{$social_platform}_link", '' );
                                        if ( ! empty( $social_url ) ) : ?>
                                            <a href="<?php echo esc_url( $social_url ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $social_platform ) ?>"></i></a>
                                        <?php endif; 

                                    endforeach;
                                ?>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                if ( is_user_logged_in() ) {
                                    echo '<a href="' . esc_url( wp_logout_url() ) . '" aria-label="Logout"><i class="fa fa-sign-out"></i> Logout</a>';
                                } else {
                                    echo '<a href="' . esc_url( wp_login_url() ) . '" aria-label="Login"><i class="fa fa-sign-in"></i> Login</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <?php 
                        if( has_custom_logo() ) :
                            the_custom_logo();
                        else :
                        ?>
                            <h2><a href="<?php echo esc_url( home_url('/') );?>"> <?php bloginfo( 'title' ); ?> </a></h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'ahncommerce-header-menu',
                            'depth'           => 2,
                            'menu_class'      => '',
                            'sub_menu_class'  => '',
                        ) );
                        ?>
                    </nav>
                </div>
                <div class="col-lg-2">
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
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'ahncommerce-categiries',
                        ) ); 
                        ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                <input type="text" name="s" placeholder="Product..." value="<?php echo esc_attr( get_search_query() ); ?>" />
                                <input type="hidden" name="post_type" value="product" />
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5> <?php echo esc_html( get_theme_mod( 'set_header_hotline', __('+880 1753214081', 'ahncommerce') ) ); ?> </h5>
                                <span> <?php echo esc_html( get_theme_mod( 'set_header_info', __('support 24/7 time', 'ahncommerce') ) ); ?> </span>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $hero_image_id = get_theme_mod('set_hero_image');
                    $hero_image_url = $hero_image_id ? wp_get_attachment_url($hero_image_id) : get_template_directory_uri() . '/assets/img/hero/banner.jpg';
                    ?>
                    <div class="hero__item set-bg hero__hide" data-setbg="<?php echo esc_url( $hero_image_url ); ?>">
                        <div class="hero__text">
                            <span><?php echo esc_html(get_theme_mod('set_hero_subtitle', __('FRUIT FRESH', 'ahncommerce'))); ?></span>
                            <h2><?php echo esc_html(get_theme_mod('set_hero_title', __('Vegetable 100% Organic', 'ahncommerce'))); ?></h2>
                            <a href="<?php echo esc_url(get_theme_mod('set_hero_button_url'), '#'); ?>" class="primary-btn">
                                <?php echo esc_html(get_theme_mod('set_hero_button_text', __('SHOP Now', 'ahncommerce'))); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

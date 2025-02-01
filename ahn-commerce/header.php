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
    <title><?php bloginfo( 'name' ); ?></title>

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
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                $payment_img = Redux::get_option( 'ahncommerce', 'logo' );
                if ( isset( $payment_img['url'] ) ) {
                    echo '<img src="' . esc_url( $payment_img['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
                }
                ?>
            </a>
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
            <?php
            $profiles = Redux::get_option( 'ahncommerce', 'social_profiles' );
            if ( ! empty( $profiles ) && is_array( $profiles ) ) {
                foreach ( $profiles as $profile ) {
                    $profile_url = ! empty( $profile['url'] ) ? esc_url( $profile['url'] ) : '#';
                    $profile_id  = isset( $profile['id'] ) ? esc_attr( $profile['id'] ) : 'default';

                    echo '<a href="' . $profile_url . '" target="_blank" rel="noopener noreferrer" aria-label="Visit ' . esc_attr( $profile_id ) . ' page">
                        <i class="fa fa-' . esc_attr( $profile_id ) . '"></i>
                    </a>';
                }
            } else {
                echo   '<a href="#" aria-label="Visit Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" aria-label="Visit Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" aria-label="Visit LinkedIn"><i class="fa fa-linkedin"></i></a>
                        <a href="#" aria-label="Visit Instagram"><i class="fa fa-instagram"></i></a>';
            }
            ?>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-phone"></i> <?php echo esc_html( Redux::get_option( 'ahncommerce', 'hotline' ) ); ?> </li>
                <li><i class="fa fa-envelope"></i> <?php echo esc_html( Redux::get_option( 'ahncommerce', 'topbar_email' ) ); ?> </li>
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
                                <li><i class="fa fa-envelope"></i> <?php echo esc_html( Redux::get_option( 'ahncommerce', 'topbar_email' ) ); ?> </li>
                                <li> <?php echo esc_html( Redux::get_option( 'ahncommerce', 'topbar_message' ) ); ?> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <?php
                                $profiles = Redux::get_option( 'ahncommerce', 'social_profiles' );
                                if ( ! empty( $profiles ) && is_array( $profiles ) ) {
                                    foreach ( $profiles as $profile ) {
                                        $profile_url = ! empty( $profile['url'] ) ? esc_url( $profile['url'] ) : '#';
                                        $profile_id  = isset( $profile['id'] ) ? esc_attr( $profile['id'] ) : 'default';

                                        echo '<a href="' . $profile_url . '" target="_blank" rel="noopener noreferrer" aria-label="Visit ' . esc_attr( $profile_id ) . ' page">
                                            <i class="fa fa-' . esc_attr( $profile_id ) . '"></i>
                                        </a>';
                                    }
                                } else {
                                    echo   '<a href="#" aria-label="Visit Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" aria-label="Visit Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" aria-label="Visit LinkedIn"><i class="fa fa-linkedin"></i></a>
                                            <a href="#" aria-label="Visit Instagram"><i class="fa fa-instagram"></i></a>';
                                }
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
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php
                            $payment_img = Redux::get_option( 'ahncommerce', 'logo' );
                            if ( isset( $payment_img['url'] ) ) {
                                echo '<img src="' . esc_url( $payment_img['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
                            }
                            ?>
                        </a>
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
                                <h5> <?php echo esc_html( Redux::get_option( 'ahncommerce', 'hotline' ) ); ?> </h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg hero__hide" data-setbg="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero/banner.jpg' ); ?>">
                        <div class="hero__text">
                            <span><?php echo esc_html( Redux::get_option( 'ahncommerce', 'hero-subtitle' ) ); ?></span>
                            <h2><?php echo esc_html( Redux::get_option( 'ahncommerce', 'hero-title' ) ); ?></h2>
                            <a href="<?php echo esc_url( Redux::get_option( 'ahncommerce', 'hero-url' ) ); ?>" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

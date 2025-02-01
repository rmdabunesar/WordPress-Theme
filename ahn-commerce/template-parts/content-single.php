<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AhnCommerce
 */

?>

<div class="blog__details__text">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
    <h3> <?php the_title(); ?> </h3>
    <p> <?php the_content() ?> </p>
</div>
<div class="blog__details__content">
    <div class="row">
        <div class="col-lg-6">
            <div class="blog__details__author">
                <div class="blog__details__author__pic">
                    <?php echo get_avatar(get_the_author_meta('ID')) ? get_avatar(get_the_author_meta('ID')) : get_template_directory() . '/assets/img/avater.jpg'; ?>
                </div>
                <div class="blog__details__author__text">
                    <h6> <?php the_author(); ?> </h6>
                    <span> <?php echo implode(', ', get_userdata(get_the_author_meta('ID'))->roles); ?> </span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="blog__details__widget">
                <ul>
                    <li><span>Categories:</span> <?php the_category(', '); ?> </li>
                    <li><span>Tags:</span> <?php the_tags('', ', ', ''); ?> </li>
                </ul>
                <div class="blog__details__social">
                    <?php
                        $profiles = Redux::get_option( 'ahncommerce', 'social_profiles' );

                        foreach ( $profiles as $profile ) {
                            $profile_url = ! empty( $profile['url'] ) ? $profile['url'] : '#';
                            echo '<a href="' . esc_url( $profile_url ) . '" target="_blank"><i class="fa fa-' . $profile['id'] . '"></i></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AhnCommerce
 */

?>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="<?php the_post_thumbnail_url() ?>" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-calendar-o"></i> <?php echo esc_html( get_the_date() ); ?> </li>
                    <li><i class="fa fa-comment-o"></i> <?php echo esc_html( get_comments_number() ) ?> </li>
                </ul>
                <h5><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></h5>
                <p> <?php has_excerpt() ? the_excerpt() : the_excerpt(); ?> </p>
                <a href="<?php the_permalink() ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
            </div>
        </div>
    </div>



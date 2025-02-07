<?php
/**
 * Template part for displaying single posts
 *
 * @package AhnCommerce
 */

?>

<div class="blog__details__text">
            <?php
				if (has_post_thumbnail()) {
					echo '<img src="' . esc_url(get_the_post_thumbnail_url()) . '" alt="' . esc_attr(get_the_title()) . '">';
				}
			?>
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
                    $social_media = [ 'facebook', 'twitter', 'linkedin', 'instagram' ];
                    foreach ( $social_media as $social_platform ) :

                        $social_url = get_theme_mod( "set_{$social_platform}_link", '' );
                        if ( ! empty( $social_url ) ) : ?>
                            <a href="<?php echo esc_url( $social_url ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $social_platform ) ?>"></i></a>
                        <?php endif; 
                        
                    endforeach;
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

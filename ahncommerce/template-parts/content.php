<?php
/**
 * Template part for displaying posts
 *
 * @package AhnCommerce
 */

?>

<div class="col-lg-6 col-md-6 col-sm-12">
	<div class="blog__item">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="blog__item__pic">
				<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php esc_attr( the_title() ); ?>">
			</div>
			<div class="blog__item__text">
				<ul>
					<li><i class="fa fa-calendar-o"></i> <?php echo esc_html( get_the_date() ); ?> </li>
					<li><i class="fa fa-comment-o"></i> <?php echo esc_html( get_comments_number() ); ?> </li>
				</ul>
				<h5><a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php the_title(); ?> </a></h5>
				<p> <?php echo esc_html( get_the_excerpt() ); ?> </p>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
			</div>
		</div>
	</div>
</div>

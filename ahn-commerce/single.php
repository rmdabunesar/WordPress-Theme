<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AhnCommerce
 */

get_header();
?>

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
			<?php
			if (have_posts()) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Single post Template Part content
					 */
					get_template_part( 'template-parts/content', 'single' );
				endwhile;

			endif;
			
			?>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Post You May Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
			<?php
				// Get the current post's ID and its categories
				$current_post_id = get_the_ID();
				$current_post_categories = wp_get_post_categories($current_post_id);

				// Define the query arguments
				$args = array(
					'category__in' => $current_post_categories, 
					'post__not_in' => array($current_post_id),  
					'posts_per_page' => 3,  
					'orderby' => 'rand'  
				);

				// Custom query to fetch related posts
				$related_query = new WP_Query($args);

				// Check if there are any related posts
				if ($related_query->have_posts()) :

					while ($related_query->have_posts()) : $related_query->the_post(); ?>

						<div class="col-lg-4 col-md-4 col-sm-6">
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
								</div>
							</div>
						</div>

					<?php endwhile;

				else :
					echo 'No related posts found.';
				endif;

				// Reset the post data
				wp_reset_postdata();
			?>
        </div>
    </div>
</section>
<!-- Related Blog Section End -->

<?php get_footer(); ?>
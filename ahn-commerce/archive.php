<?php
/**
 * The template for displaying archive pages (category, tag, author, etc.)
 *
 * @package AhnCommerce
 */

get_header();
?>

<!-- Blog Archive Section Begin -->
<section class="blog-archive spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-5">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-lg-8 col-md-7">
				<div class="row">

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							// Include the Post-Type-specific template for the content.
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						// Navigation for previous and next pages
						the_posts_navigation( array(
							'prev_text' => esc_html__( 'Previous page', 'ahncommerce' ),
							'next_text' => esc_html__( 'Next page', 'ahncommerce' ),
						) );

					else :
						// In case no posts are found
						echo '<p>' . esc_html__( 'No posts found.', 'ahncommerce' ) . '</p>';
					endif;
					?>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Archive Section End -->

<?php get_footer(); ?>

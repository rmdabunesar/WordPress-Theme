<?php
/**
 * The template for displaying search results pages
 *
 * @package AhnCommerce
 */

get_header();
?>

<section class="spad">
	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'ahncommerce' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
				<?php while ( have_posts() ) : the_post(); ?>
					<!-- Search result template -->
					<?php get_template_part( 'template-parts/content', 'search' ); ?>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
?>

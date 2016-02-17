<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/cover', 'archive' ); ?>

			<?php if ( have_posts() ) : ?>

				<?php
				$list_style = esc_attr( get_theme_mod( 'cover_list_style', 'minimal' ) );
				$number_of_columns = esc_attr( get_theme_mod( 'cover_number_of_columns', 1 ) );
				?>

				<div id="posts" class="<?php echo $list_style; ?> <?php if ( 'grid' == $list_style && $number_of_columns > 1 ) { echo 'card-' . $number_of_columns; } ?>">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'summary' ); ?>

					<?php endwhile; ?>
				</div>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer();

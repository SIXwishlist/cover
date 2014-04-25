<?php
/**
 * @package Cover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
		$show_header = true;
		if ('' != get_the_post_thumbnail() || get_post_format() == 'quote') {
			$show_header = false;
		}
	?>
	
	<?php if ($show_header) { ?>
		<header class="entry-header">
			<h2><?php the_category(', ') ?></h2>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php cover_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cover' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		
		<div class="cf">
			<?php $tag_list = get_the_tag_list( '<ul class="tag-list"><li>', '</li><li>', '</li></ul>' ); ?>
			<?php if ( '' != $tag_list ) { ?>
				<?php echo $tag_list; ?>
			<?php } ?>
			<?php edit_post_link( __( 'Edit', 'cover' ), '<span class="edit-link pull-right">', '</span>' ); ?>
		</div>
		
		<?php get_template_part( 'parts/author-bio' ); ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->

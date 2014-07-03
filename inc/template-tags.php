<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cover
 */

if ( ! function_exists( 'cover_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function cover_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'cover' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<i class="fa fa-fw fa-chevron-left meta-nav"></i><span>Older posts</span>', 'cover' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span>Newer posts</span><i class="fa fa-fw fa-chevron-right meta-nav"></i>', 'cover' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'cover_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function cover_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( true, '', true );
	$next = get_adjacent_post( true, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'cover' ); ?></h1>
		<div class="nav-links cf">
			<?php
				$prev_img = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'single-post-thumbnail' );
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<div class="post-nav-container"><div class="post-nav-background" style="background-image: url(\'' . $prev_img[0] . '\')"></div><i class="fa fa-fw fa-chevron-left meta-nav"></i></div><span class="left">%title</span>', 'Previous post link', 'cover' ), true );
				
				$next_img = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'single-post-thumbnail' );
				next_post_link( '<div class="nav-next">%link</div>', _x( '<span class="right">%title</span><div class="post-nav-container"><div class="post-nav-background" style="background-image: url(\'' . $next_img[0] . '\')"></div><i class="fa fa-fw fa-chevron-right meta-nav"></i></div>', 'Next post link', 'cover' ), true );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'cover_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function cover_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    $category_output = '';
    $category_separator = ', ';
    $categories = get_the_category();
    foreach($categories as $category) {
        $category_output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $category_separator;
    }
    $category_output = trim( $category_output, $category_separator );
    
    printf( __( '<span class="posted-on">%1$s on %2$s in %3$s</span>', 'cover' ),
		sprintf( '<span class="author vcard">%1$s <a class="url fn n" href="%2$s">%3$s</a></span>',
			get_avatar( get_the_author_meta( 'ID' ), 35 ) . ' ',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		),
        sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ),
			$time_string
		),
        sprintf( $category_output )
	);
    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function cover_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so cover_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so cover_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in cover_categorized_blog.
 */
function cover_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'cover_category_transient_flusher' );
add_action( 'save_post',     'cover_category_transient_flusher' );

<?php
/**
 * @package Cover
 */
?>

<?php

    $class = '';

    if ( '' != get_the_post_thumbnail() ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $width = $img[1];
        $height = $img[2];

		$class = ' featured-image';

        if ( $height > 1 && $height <= 600 ) {
            $class = $class . ' hero';
        } else if ( $height > 600 ) {
			$class = $class . ' full';
		}
    }

?>

<div class="cover<?php echo $class; ?>">
    <div class="background" <?php if ( '' != $class ) { ?>style="background-image: url('<?php echo $img[0]; ?>');"<?php } ?>></div>

    <header class="cover-header">

        <?php if ( is_page() ) { ?>
            <?php if ( $post->post_parent ) {
                $parent_permalink = get_permalink($post->post_parent);
                $parent_title = get_the_title($post->post_parent);
            ?>
                <h2 class="cover-subtitle"><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
            <?php } ?>
        <?php } ?>

        <h1 class="cover-title"><?php the_title(); ?></h1>

    </header>

</div>
<?php
/*
YARPP Template: Cover
Description: Full-width related posts template built for the Cover theme. Works best with a maximum number divisible by 4.
Author: Paul Eiche
*/ ?>
<?php if ( have_posts() ) : ?>

<h2>Related</h2>
<ul class="yarpp-related-cover cf">
    
    <?php while ( have_posts() ) : the_post(); ?>
    <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php
                $img = '';
                if ( has_post_thumbnail() ) {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0];
                }
            ?>
            
            <span class="yarpp-related-cover-background"<?php if ( $img != '' ) { ?> style="background-image: url('<?php echo $img ?>');"<?php } ?>></span>
            <span class="yarpp-related-cover-title"><?php the_title_attribute(); ?></span>
        </a>
    </li>
    <?php endwhile; ?>
    
</ul>

<?php endif; ?>
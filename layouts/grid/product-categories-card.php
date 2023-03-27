<?php
$thumbnailID = get_term_meta( $category->term_id, 'thumbnail_id', true );
$featuredImage = wp_get_attachment_image( $thumbnailID );
?>

<div class="card">
    <?php if ( $category ) : ?>
        <a href="<?php echo get_permalink( $category->term_id ); ?>" target="" class="cover-link"></a>
    <?php endif; ?>
    <!-- Image -->
    <div class="image">
        <?php if ( $featuredImage ) : ?>
            <?php echo $featuredImage ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <!-- Header -->
        <?php if( $category->name ) : ?>
            <h3><?php echo $category->name ?></h3>
        <?php endif; ?>
        <!-- Product count -->
        <p class="product-count">
            (<?php echo $category->count ?>)
        </p>
    </div>
</div>

<?php
unset( $featuredImage );
?>
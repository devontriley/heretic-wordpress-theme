<?php
// $article variable must exist for this module to function properly
$articleID = $article->ID;
$articleTitle = $article->post_title;
$fImage = wp_get_attachment_image( get_post_thumbnail_id( $articleID ), 'full' );
$featuredImage = get_the_post_thumbnail( $articleID );
?>

<div class="card">
    <?php if ( $article ) : ?>
        <a href="<?php echo get_permalink( $articleID ); ?>" target="" class="cover-link"></a>
    <?php endif; ?>
    <!-- Image -->
    <div class="image">
        <?php if ( $fImage ) : ?>
            <?php echo $fImage ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <!-- Header -->
        <?php if( $articleTitle ) : ?>
            <h3 class="card-title"><?php echo $articleTitle ?></h3>
        <?php endif; ?>
        <?php if ( get_post_type( $articleID ) === 'post' ) : ?>
        <!-- Date -->
        <p class="date">
            <?php echo get_the_date( 'M d, Y', $articleID ) ?>
        </p>
        <?php endif; ?>
    </div>
</div>

<?php unset( $articleID, $articleTitle, $fImage, $featuredImage ); ?>
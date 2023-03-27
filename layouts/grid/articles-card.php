<?php
$fImage = wp_get_attachment_image( get_post_thumbnail_id( $p->ID ), 'full' );
$featuredImage = get_the_post_thumbnail( $p->ID );
?>

<div class="card">
    <?php if ( $p ) : ?>
        <a href="<?php echo get_permalink( $p->ID ); ?>" target="" class="cover-link"></a>
    <?php endif; ?>
    <!-- Image -->
    <div class="image">
        <?php if ( $fImage ) : ?>
            <?php echo $fImage ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <!-- Header -->
        <?php if( $p->post_title ) : ?>
            <h3 class="card-title"><?php echo $p->post_title ?></h3>
        <?php endif; ?>
        <?php if ( get_post_type( $p->ID ) === 'post' ) : ?>
        <!-- Date -->
        <p class="date">
            <?php echo get_the_date( 'M d, Y', $p->ID ) ?>
        </p>
        <?php endif; ?>
    </div>
</div>

<?php unset( $featuredImage ); ?>
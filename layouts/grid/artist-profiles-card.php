<?php
$id = $artist->ID;
$featuredImage = get_the_post_thumbnail( $id );
?>

<div class="text-center position-relative">
    <!-- Image -->
    <?php if ( $featuredImage ) : ?>
        <?php echo $featuredImage ?>
    <?php endif; ?>
    <!-- Header -->
    <?php if( $artist->post_title ) : ?>
        <h3><?php echo $artist->post_title ?></h3>
    <?php endif; ?>
</div>
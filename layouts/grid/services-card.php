<?php
$fImage = wp_get_attachment_image( get_post_thumbnail_id( $p->ID ), 'full' );
$featuredImage = get_the_post_thumbnail( $p->ID );
$serviceCats = wp_get_post_terms( $p->ID, array(
    'taxonomy' => 'services-categories'
));
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
        <!-- Categories -->
        <?php if ( $serviceCats ) : ?>
            <ul class="service-category-pills">
                <?php foreach ( $serviceCats as $serviceCat ) : ?>
                    <?php if ( $serviceCat->parent !== 0 ) : ?>
                        <li><?php echo $serviceCat->name ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php unset( $featuredImage ); ?>
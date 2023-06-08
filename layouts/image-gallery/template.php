<?php
global $layoutCounter;

$header = get_sub_field('header');
$bodyCopy = get_sub_field('body_copy');
$images = get_sub_field( 'images' );
?>

<div id="layout-image-gallery-<?php echo $layoutCounter ?>" class="layout-image-gallery layout-vertical-spacing <?php if ( $is_preview ) { echo 'is-preview'; } ?>"
     data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">

        <?php if ( $header || $bodyCopy ) : ?>
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0 text-center">
                    <?php if ( $header ) : ?>
                        <h2 class="h1"><?php echo $header ?></h2>
                    <?php endif; ?>
                    <?php if ( $bodyCopy ) : ?>
                        <?php echo $bodyCopy ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( $images ) : ?>
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                    <div class="row lightbox">
                        <?php foreach ( $images as $key => $image ) : ?>
                            <div class="col-6 col-sm-4 col-md-3">
                                <!-- Image -->
                                <?php if ( $image['image'] ) : ?>
                                    <a href="<?php echo $image['image']['url'] ?>" class="d-block" rel="lightbox1">
                                        <?php echo wp_get_attachment_image( $image['image']['ID'], 'medium' ); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php unset( $header, $bodyCopy, $images ); ?>

<?php $layoutCounter++; ?>
<?php
global $layoutCounter;

$video = get_sub_field('video');
$bodyCopy = get_sub_field( 'body_copy' );
?>

<div class="layout-video layout-vertical-spacing <?php if ( $is_preview ){ echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 text-center">
                <?php echo $video ?>
                <?php if ( $bodyCopy ) : ?>
                    <div class="body-copy">
                        <?php echo $bodyCopy ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $video ); ?>

<?php $layoutCounter++; ?>
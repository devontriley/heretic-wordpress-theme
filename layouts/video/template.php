<?php
global $layoutCounter;

$video = get_sub_field('video');
?>

<div class="layout-video <?php if ( $is_preview ){ echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <?php echo $video ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $video ); ?>

<?php $layoutCounter++; ?>
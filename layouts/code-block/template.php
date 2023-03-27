<?php
global $layoutCounter;

$code = get_sub_field( 'code' );
?>

<div class="layout code-block <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <?php echo $code ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $code ); ?>

<?php $layoutCounter++; ?>
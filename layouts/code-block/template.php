<?php
global $layoutCounter;

$code = get_sub_field( 'code' );
?>

<div class="layout-code-block layout-vertical-spacing <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <?php echo $code ?>
    </div>
</div>

<?php unset( $code ); ?>

<?php $layoutCounter++; ?>
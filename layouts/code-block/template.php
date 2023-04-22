<?php
global $layoutCounter;
$header = get_sub_field('header');
$headerSize = get_sub_field( 'header_size' );
$bodyCopy = get_sub_field('body_copy');
$code = get_sub_field( 'code' );
?>

<div class="layout-code-block layout-vertical-spacing <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <?php if ( $header ) : ?>
                <div class="header text-center col-sm-10 col-md-6 offset-sm-1 offset-md-3">
                    <<?php echo $headerSize ?>>
                        <?php echo $header ?>
                    </<?php echo $headerSize ?>>
                    <?php
                    if ( $bodyCopy ) {
                        echo $bodyCopy;
                    } ?>
                </div>
            <?php endif; ?>
        </div>
        <?php echo $code ?>
    </div>
</div>

<?php unset( $code ); ?>

<?php $layoutCounter++; ?>
<?php
$imageAsIcon = get_sub_field( 'image_as_icon' );
$centerHeader = get_sub_field( 'center_header' );
$tealBackground = get_sub_field( 'teal_card_background' );
?>

<div class="container-lg <?php if ( $tealBackground ) { echo 'colored-cards'; } ?>">
    <div class="row">
        <?php if ( $header || $bodyCopy ) : ?>
        <div class="header col-sm-10 offset-sm-1 col-lg-8 <?php echo in_array( $columns, array( 'Three', 'Four' ) ) ? 'offset-lg-0' : 'offset-lg-2'; ?> <?php if ( $centerHeader ) { echo 'text-center offset-lg-2'; } ?>">
            <?php if ( $header ) : ?>
                <<?php echo $headerSize ?>>
                    <?php echo $header ?>
                </<?php echo $headerSize ?>>
            <?php endif; ?>
            <?php if ( $bodyCopy ) : ?>
                <div class="col">
                    <?php echo $bodyCopy ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 <?php echo in_array( $columns, array( 'Three', 'Four' ) ) ? 'col-lg-12 offset-lg-0' : 'col-lg-8 offset-lg-2'; ?>">
            <div class="row">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <div class="grid col-sm-6 <?php echo in_array( $columns, array( 'Three', 'Four' ) ) ? 'col-lg-4' : 'col-lg-6'; ?>" data-image-as-icon="<?php echo $imageAsIcon ?>">
                        <?php include( 'info-boxes-card.php' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $imageType ); ?>
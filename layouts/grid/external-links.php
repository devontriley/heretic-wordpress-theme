<div class="container-lg">
    <?php if ( $header ) : ?>
    <div class="row">
        <div class="header col-sm-10 offset-sm-1 col-lg-12 offset-lg-0 text-center">
            <<?php echo $headerSize ?>>
                <?php echo $header ?>
            </<?php echo $headerSize ?>>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
            <div class="row">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <div class="grid col-md-6">
                        <?php include( 'external-links-card.php' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php unset( $header, $headerSize, $cards, $card ); ?>
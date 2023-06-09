<div class="container-lg">
    <?php if ( $header || $bodyCopy ) : ?>
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0 header text-center">
            <?php if ( $header ) : ?>
                <<?php echo $headerSize ?>>
                    <?php echo $header ?>
                </<?php echo $headerSize ?>>
            <?php endif; ?>
            <?php if ( $bodyCopy ) : ?>
                <div class="col-lg-6 <?php if ( $centerHeader ) { echo 'offset-lg-3'; } ?>">
                    <?php echo $bodyCopy ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
            <div class="row">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <div class="grid col-6 col-md-4 col-lg-3">
                        <?php include( 'logos-card.php' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
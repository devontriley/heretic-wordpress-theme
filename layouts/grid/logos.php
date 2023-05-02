<div class="container-lg">
    <?php if ( $header ) : ?>
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0 header text-center">
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
                    <div class="grid col-6 col-md-4 col-lg-3">
                        <?php include( 'logos-card.php' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
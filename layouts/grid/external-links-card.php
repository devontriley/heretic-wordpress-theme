<div class="card">
    <a href="<?php echo $card['text_link']['url'] ?>" target="_blank" class="cover-link"></a>
    <div class="card-body">
        <!-- Header -->
        <?php if ( $card['card_header'] ) : ?>
            <!-- Header -->
            <?php if ( $header ) : ?>
                <h3><?php echo $card['card_header'] ?></h3>
            <?php endif; ?>
            <!-- Card body -->
            <?php if ( $card['card_body'] ) : ?>
                <p><?php echo $card['card_body'] ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<div class="form-copy">
    <!-- Eyebrow -->
    <?php if ( $eyebrowText ) : ?>
        <p class="eyebrow"><?php echo $eyebrowText ?></p>
    <?php endif; ?>
    <!-- Header -->
    <?php if ( $header ) : ?>
        <h1><?php echo $header ?></h1>
    <?php endif; ?>
    <!-- Body Copy -->
    <?php if ( $bodyCopy ) : ?>
        <?php echo apply_filters( 'the_content', $bodyCopy ); ?>
    <?php endif; ?>
</div>
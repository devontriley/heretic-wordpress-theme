<?php
global $layoutCounter;

$format = get_sub_field( 'format' );
$formShortcode = get_sub_field( 'form_shortcode' );
$eyebrowText = get_sub_field( 'eyebrow_text' );
$header = get_sub_field( 'header' );
$bodyCopy = get_sub_field( 'body_copy' );

$newsletterForm = get_field( 'newsletter_form_embed', 'option' );
?>

<div class="layout-form layout-vertical-spacing <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="<?php echo ( $format !== 'Newsletter' ) ? 'col-sm-10 offset-sm-1' : 'col-12'; ?>">
                <div class="row <?php if ( $format === 'Boxed Narrow' ) { echo 'justify-content-center'; } ?>">
                    <?php if( $format === 'Two Column' ) : ?>

                    <!-- Copy -->
                    <div class="col-lg-6">
                        <?php include( 'form-copy.php' ); ?>
                    </div>

                    <!-- Form -->
                    <div class="col-lg-5 offset-lg-1">
                        <?php if ( $formShortcode ) : ?>
                            <?php echo do_shortcode( $formShortcode ); ?>
                        <?php endif; ?>
                    </div>

                    <?php elseif ( $format === 'Boxed Wide' ) : ?>

                    <div class="col-lg-12">
                        <div class="form-boxed-container">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="text-center">
                                        <?php include( 'form-copy.php' ); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <?php if ( $formShortcode ) : ?>
                                        <?php echo do_shortcode( $formShortcode ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php elseif ( $format === 'Boxed Narrow' ) : ?>

                    <div class="col-lg-10 col-xl-8">
                        <div class="form-boxed-container">
                            <div class="text-center">
                                <?php include( 'form-copy.php' ); ?>
                            </div>

                            <?php if ( $formShortcode ) : ?>
                                <?php echo do_shortcode( $formShortcode ); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php elseif ( $format === 'Newsletter' ) : ?>

                    <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                        <div class="newsletter-container">
                            <div class="row justify-content-center">
                                <div class="col-sm-10 col-lg-8 col-xl-6">
                                    <div class="text-center">
                                        <?php include( 'form-copy.php' ); ?>
                                    </div>

                                    <?php if ( $newsletterForm ) : ?>
                                        <div class="newsletter-form">
                                            <?php echo $newsletterForm ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset( $format, $formShortcode, $eyebrowText, $header, $bodyCopy ); ?>
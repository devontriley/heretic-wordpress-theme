<?php
global $layoutCounter;

$header = get_sub_field( 'header' );
$image = get_sub_field( 'image' );
$accordionItems = get_sub_field( 'accordion_items' );
?>

<div class="layout-accordion layout-vertical-spacing" data-layout-count="<?php echo $layoutCounter ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">

                <?php if ( ! $image ) { ?><div class="accordion-container"><?php } ?>

                    <div class="row">

                        <!-- Header -->
                        <?php if ( $image && $header ) : ?>
                            <h2><?php echo $header ?></h2>
                        <?php endif; ?>

                        <div class="<?php echo ( ! $image ) ? 'col-12' : 'col-lg-7 col-xl-6'; ?>">

                            <!-- Header -->
                            <?php if ( ! $image && $header ) : ?>
                                <h2><?php echo $header ?></h2>
                            <?php endif; ?>

                            <!-- Accordion Items -->
                            <?php if ( $accordionItems ) : ?>
                                <div class="accordion" id="accordion-<?php echo $layoutCounter ?>">
                                    <?php foreach ( $accordionItems as $key => $item ) : ?>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="accordionHeader-<?php echo $layoutCounter ?>-<?php echo $key ?>">
                                                <button class="h3 accordion-button collapsed"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accordion-<?php echo $layoutCounter ?>-<?php echo $key ?>"
                                                        aria-expanded="false"
                                                        aria-controls="accordion-<?php echo $layoutCounter ?>"
                                                >
                                                    <?php echo $item['header'] ?>
                                                </button>
                                            </h3>
                                            <div id="accordion-<?php echo $layoutCounter ?>-<?php echo $key ?>"
                                                 class="accordion-collapse collapse"
                                                 aria-labelledby="accordionHeader-<?php echo $layoutCounter ?>-<?php echo $key ?>"
                                                 data-bs-parent="#accordion-<?php echo $layoutCounter ?>"
                                            >
                                                <div class="accordion-body">
                                                    <?php echo $item['body_copy'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <?php if ( $image ) : ?>
                            <div class="image col-lg-5 offset-xl-1">
                                <div class="image-wrapper">
                                    <!-- Image -->
                                    <?php if ( $image ) : ?>
                                        <?php echo wp_get_attachment_image( $image['ID'], 'full' ) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php if ( ! $image ) { ?></div><?php } ?>

            </div>
        </div>
    </div>
</div>

<?php unset( $header, $image, $accordionItems ); ?>

<?php $layoutCounter++; ?>
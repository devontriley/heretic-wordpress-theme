<?php
global $serviceLayoutCounter;

$header = get_sub_field( 'header' );
$accordionItems = get_sub_field( 'accordion_items' );
?>

<div id="service-layout-accordion-<?php echo $serviceLayoutCounter ?>" class="layout-accordion <?php if ( $is_preview ) { echo 'is-preview'; } ?>" data-layout-count="<?php echo $serviceLayoutCounter ?>">

    <!-- Header -->
    <?php if ( $header ) : ?>
        <h2><?php echo $header ?></h2>
    <?php endif; ?>

    <!-- Accordion Items -->
    <?php if ( $accordionItems ) : ?>
        <div class="accordion" id="accordion-<?php echo $serviceLayoutCounter ?>">
            <?php foreach ( $accordionItems as $key => $item ) : ?>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="accordionHeader-<?php echo $serviceLayoutCounter ?>-<?php echo $key ?>">
                        <button class="h3 accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#accordion-<?php echo $serviceLayoutCounter ?>-<?php echo $key ?>"
                                aria-expanded="false"
                                aria-controls="accordion-<?php echo $serviceLayoutCounter ?>"
                        >
                            <?php echo $item['header'] ?>
                        </button>
                    </h3>
                    <div id="accordion-<?php echo $serviceLayoutCounter ?>-<?php echo $key ?>"
                         class="accordion-collapse collapse"
                         aria-labelledby="accordionHeader-<?php echo $serviceLayoutCounter ?>-<?php echo $key ?>"
                         data-bs-parent="#accordion-<?php echo $serviceLayoutCounter ?>"
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

<?php $serviceLayoutCounter++; ?>

<?php unset( $header, $image, $accordionItems ); ?>
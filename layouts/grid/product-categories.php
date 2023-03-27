<?php
$productCategories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => true
));
?>

<div class="container-lg">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-4 col-lg-12 offset-lg-0">
            <h2><?php echo $header ?></h2>
        </div>
    </div>

    <?php if( $productCategories ) : ?>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                <div class="row">
                    <?php foreach ( $productCategories as $key => $category ) : ?>
                        <div class="grid col-6 col-md-4 col-xl-3">
                            <?php include( 'product-categories-card.php' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php unset( $productCategories ); ?>

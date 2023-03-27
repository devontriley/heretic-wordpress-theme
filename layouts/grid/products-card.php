<?php
$checkoutURL = wc_get_checkout_url();
$price = $product->get_price();
$featuredImage = $product->get_image();
?>

    <div class="card">
        <!-- Image -->
        <div class="image">
            <?php if ( $featuredImage ) : ?>
                <?php echo $featuredImage ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <!-- Header -->
            <h3><?php echo $product->get_title() ?></h3>
            <!-- Price -->
            <p class="price"><?php echo $price ?></p>
            <!-- Add to cart button -->
            <a href="<?php echo $checkoutURL . $product->add_to_cart_url() ?>" class="btn btn-primary"><?php echo $product->add_to_cart_text() ?></a>
        </div>
    </div>

<?php
unset( $featuredImage );
?>
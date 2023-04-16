<?php

/*
 * Remove woocommerce sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/*
 * Remove <a> tag around products in loop
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );

/*
 * Add wrapper around product thumbnail copy
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_product_copy_wrapper_start', 15 );
function woocommerce_product_copy_wrapper_start() {
    echo '<div class="card-body">';
}

/*
 * Add close wrapper around product thumbnail copy
 */
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_product_copy_wrapper_end', 15 );
function woocommerce_product_copy_wrapper_end() {
    echo '</div><!-- .card-body -->';
}

/*
 * Add wrapper around category thumbnail copy
 */
add_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_category_copy_wrapper_start', 5 );
function woocommerce_category_copy_wrapper_start() {
    echo '<div class="card-body">';
}

/*
 * Add close wrapper around category thumbnail copy
 */
add_action( 'woocommerce_after_subcategory', 'woocommerce_category_copy_wrapper_end', 10 );
function woocommerce_category_copy_wrapper_end() {
    echo '</div><!-- .card-body -->';
}

/*
 * Change product thumbnail title from h2 to h3
 */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
    function woocommerce_template_loop_product_title() {
        global $product;

        $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

        echo '<h3 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">';
        echo '<a href="'. $link .'">';
        echo get_the_title();
        echo '</a>';
        echo '</h3>';
    }
}

/*
 * Change category thumbnail title from h2 to h3
 */
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
if ( ! function_exists( 'woocommerce_template_loop_category_title' ) ) {
    function woocommerce_template_loop_category_title( $category ) { ?>
        <h3 class="woocommerce-loop-category__title">
            <a href="<?php echo esc_url( get_term_link( $category, 'product_cat' ) ) ?>">
                <?php echo esc_html( $category->name ); ?>
            </a>
        </h3>
        <?php if ( $category->count > 0 ) { ?>
            <p class="product-count">
                <?php echo apply_filters( 'woocommerce_subcategory_count_html', ' (' . esc_html( $category->count ) . ')', $category ); ?>
            </p>
        <?php } ?>
    <?php }
}

/*
 * Add wrapper and link around product thumbnail
 */
add_filter( 'woocommerce_product_get_image', function( $image ) {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    $output = '<div class="image">';
    $output .= '<a href="'. $link .'">';
    $output .= $image;
    $output .= '</a>';
    $output .= '</div>';

    return $output;
});

/*
 * Add open wrapper and link around category thumbnail
 */

add_action( 'woocommerce_before_subcategory_title', 'woocommerce_open_wrapper_category_thumbnail', 5 );
function woocommerce_open_wrapper_category_thumbnail( $category ) {
    echo '<div class="image">';
}
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_template_loop_category_link_open', 7 );
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_template_loop_category_link_close', 12 );
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_close_wrapper_category_thumbnail', 15 );
function woocommerce_close_wrapper_category_thumbnail( $category ) {
    echo '</div>';
}

/*
 * Add correct btn classes to add tocart buttons in loop
 */

function my_custom_add_to_cart_args( $args, $product ) {
    $args['class'] = 'wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart btn btn-primary';
    return $args;
}
add_filter( 'woocommerce_loop_add_to_cart_args', 'my_custom_add_to_cart_args', 10, 2 );

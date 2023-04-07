<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

$shopFields = get_field( 'shop', 'option' );
if ( $shopFields ) {
    /* Shop Intro */
    $shopIntro = $shopFields['shop_intro_copy'];
    $shopIntroEyebrow = $shopIntro['eyebrow_text'];
    $shopIntroHeader = $shopIntro['header'];
    $shopIntroBody = $shopIntro['body_copy'];

    /* Commission and Contact */
    $commissionContact = $shopFields['commission_and_contact_section'];
    $commissionContactHeader = $commissionContact['header'];
    $commissionContactBody = $commissionContact['body_copy'];
    $commissionContactSidebar = $commissionContact['sidebar'];

    /* Big CTA */
    $bigCTA = $shopFields['big_cta'];
    $bigCTAText = $bigCTA['text'];
    $bigCTALink = $bigCTA['link'];
}

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

    <?php if ( is_shop() ) : ?>

        <?php //echo do_shortcode( '[product_categories parent="0" ids="48, 149, 127, 118, 18, 115, 121, 164, 116, 120, 177, 119, 172, 139, 169"]' ); ?>

        <?php if ( $shopIntroHeader && $shopIntroBody ) : ?>
            <div class="layout-rte mt-0">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1 text-center col-md-6 offset-md-3">
                            <!-- Eyebrow text -->
                            <?php if ( $shopIntroEyebrow ) : ?>
                                <p class="eyebrow"><?php echo $shopIntroEyebrow ?></p>
                            <?php endif; ?>
                            <!-- Header -->
                            <?php if ( $shopIntroHeader ) : ?>
                                <h1><?php echo $shopIntroHeader ?></h1>
                            <?php endif; ?>
                            <!-- Body copy -->
                            <?php if ( $shopIntroBody ) : ?>
                                <?php echo apply_filters( 'the_content', $shopIntroBody ) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php else : ?>

        <header class="woocommerce-products-header">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>

            <?php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action( 'woocommerce_archive_description' );
            ?>
        </header>

    <?php endif; ?>

<?php if ( woocommerce_product_loop() ) { ?>

    <div class="archive-results-wrapper">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop.
         *
         * @hooked woocommerce_output_all_notices - 10
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        do_action( 'woocommerce_before_shop_loop' );
        ?>
    </div>

    <?php
    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action( 'woocommerce_shop_loop' );

            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action( 'woocommerce_after_shop_loop' );
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>

<?php if ( is_shop() ) : ?>

    <?php if ( $commissionContactHeader && $commissionContactBody ) : ?>
        <div class="layout-rte mt-0">
            <div class="container-lg">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-10 offset-lg-1 col-xl-7 offset-xl-1">
                        <!-- Header -->
                        <?php if ( $commissionContactHeader ) : ?>
                            <h2 class="h1"><?php echo $commissionContactHeader ?></h2>
                        <?php endif; ?>
                        <!-- Body copy -->
                        <?php if ( $commissionContactBody ) : ?>
                            <?php echo apply_filters( 'the_content', $commissionContactBody ) ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-10 offset-lg-1 col-xl-2 offset-xl-1">
                        <?php if ( $commissionContactSidebar ) : ?>
                            <?php echo apply_filters( 'the_content', $commissionContactSidebar ) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( $bigCTAText || $bigCTALink ) : ?>
        <div class="layout-big-cta">
            <div class="container-lg">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 col-lg-12 offset-lg-0">
                        <div class="cta-wrapper">
                            <!-- Text -->
                            <?php if ( $bigCTAText ) : ?>
                                <p class="text"><?php echo $bigCTAText ?></p>
                            <?php endif; ?>
                            <!-- Text Link -->
                            <?php if ( $bigCTALink ) : ?>
                                <a class="text-link" href="<?php echo $bigCTALink['url'] ?>" target="<?php echo $bigCTALink['target'] ?>">
                                    <?php echo $bigCTALink['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
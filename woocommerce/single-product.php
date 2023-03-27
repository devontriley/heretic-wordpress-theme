<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

$shopFields = get_field( 'shop', 'option' );
if ( $shopFields ) {
	/* Commission and Contact */
	$commissionContact = $shopFields['commission_and_contact_section'];
	$commissionContactHeader = $commissionContact['header'];
	$commissionContactBody = $commissionContact['body_copy'];
	$commissionContactSidebar = $commissionContact['sidebar'];

	/* Big CTA */
	$bigCTA = $shopFields['big_cta'];
	$bigCTAText = $bigCTA['text'];
	$bigCTALink = $bigCTA['link'];

	/* Colored Icon Boxes */
	$rows = $shopFields['colored_icon_boxes_rows'];
}
?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

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

	<?php if ( $rows ) : ?>
		<?php include( get_template_directory().'/layouts/colored-icon-cards/template.php' ); ?>
	<?php endif; ?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php if ( is_page( 'shop' ) ) :
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
    ?>

    <?php if ( $shopIntroHeader && $shopIntroBody ) : ?>
        <div class="layout-rte layout-vertical-spacing">
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
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

        <!-- ACF Modules -->
        <?php
        if(has_flexible('Modules')):
            the_flexible('Modules');
        endif;
        ?>

		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'heretic' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'heretic' ),
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( is_page( 'shop' ) ) : ?>

    <?php if ( $commissionContactHeader && $commissionContactBody ) : ?>
        <div class="layout-rte layout-vertical-spacing">
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
        <div class="layout-big-cta layout-vertical-spacing">
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
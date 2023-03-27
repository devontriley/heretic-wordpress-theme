<?php
// Template Name: Services
get_header();

$servicesIntro = get_field( 'services_intro' );
$eyebrowText = $servicesIntro['eyebrow_text'];
$header = $servicesIntro['header'];
$bodyCopy = $servicesIntro['body_copy'];
?>

<div class="container-lg">
    <?php if ( $servicesIntro ) : ?>
    <div class="services-intro">
        <div class="row">
            <div class="col-lg-6">
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
                    <?php echo $bodyCopy ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <div class="services-facets">
                <?php echo do_shortcode( '[facetwp facet="conditions"]' ); ?>
                <?php echo do_shortcode( '[facetwp facet="age_eligibility"]' ); ?>
                <?php echo do_shortcode( '[facetwp facet="reset_all_filters"]' ); ?>
            </div>
        </div>
        <div class="col-md-8 offset-md-1">
            <?php echo do_shortcode( '[facetwp template="services"]' ); ?>
            <?php echo do_shortcode( '[facetwp facet="services_pager"]' ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>